<template>
    <div>
        <div class="text-white">

            <br>
            <br>
            <!-- {{customers}} -->
            <Toast />
            <Toast position="top-left" group="tl" />
            <Toast position="bottom-left" group="bl" />
            <Toast position="bottom-right" group="br" />
            <DataTable :value="customers" stripedRows responsiveLayout="scroll" :paginator="true" :rows="10"
                dataKey="id"
                paginatorTemplate="CurrentPageReport FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink RowsPerPageDropdown"
                :rowsPerPageOptions="[10,20,50]" currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"
                :resizableColumns="true" columnResizeMode="expand" showGridlines :filters="filters">

                <template #header>
                    <div class="table-header p-d-flex p-flex-column p-flex-md-row p-jc-md-between">
                        <h5 class="p-mb-2 p-m-md-0 p-as-md-center">Manage Customers</h5>
                        <span>

                        </span>

                        <span class="p-input-icon-left">

                            <i class="pi pi-search" />
                            <InputText v-model="filters['global'].value" placeholder="Search..." />
                        </span>
                    </div>
                </template>
                <Column :exportable="false" header="No">
                    <template #body="slotProps">
                        {{slotProps.index +1}}
                    </template>
                </Column>
                <Column field="nama" header="Nama" :sortable="true"></Column>
                <Column field="instansi" header="Instansi" :sortable="true"></Column>
                <Column field="email" header="Email" :sortable="true"></Column>
                <Column field="no_wa" header="No WA" :sortable="true"></Column>
                <Column :exportable="false" header="Aksi">
                    <template #body="slotProps">
                        <Button icon="pi pi-pencil" class="p-button-rounded p-button-primary p-mr-2"
                            @click="editDataDialog(slotProps)" />
                        <Button icon="pi pi-trash" class="p-button-rounded p-button-danger"
                            @click="deleteCustomerDialog(slotProps.data)" />

                    </template>
                </Column>
            </DataTable>
            <ConfirmDialog></ConfirmDialog>
            <Dialog header="Edit Customer" :visible="editDialog" :style="{width: '50vw'}">

                <div class="p-fluid">
                    <div class="p-field p-grid">
                        <label for="firstname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">Nama</label>
                        <div class="p-col-12 p-md-10">
                            <InputText v-model="editedNama" type="text" />
                        </div>
                    </div>
                    <div class="p-field p-grid">
                        <label for="lastname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">Instansi</label>
                        <div class="p-col-12 p-md-10">
                            <InputText v-model="editedInstansi" type="text" />
                        </div>
                    </div>
                    <div class="p-field p-grid">
                        <label for="lastname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">Email</label>
                        <div class="p-col-12 p-md-10">
                            <InputText v-model="editedEmail" type="text" />
                        </div>
                    </div>
                    <div class="p-field p-grid">
                        <label for="lastname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">No WA</label>
                        <div class="p-col-12 p-md-10">
                            <InputText v-model="editedNoWa" type="text" />
                        </div>
                    </div>
                </div>
                <template #footer>
                    <Button label="No" icon="pi pi-times" @click="closeEditedDialog()" class="p-button-text" />
                    <Button label="Yes" icon="pi pi-check" @click="kirimEditedUser()" autofocus />
                </template>
            </Dialog>
        </div>
        <!-- <div class="text-white">
        Soon. Halaman untuk manajemen user dan kategori :D
        <br>
    
    </div> -->
    </div>
</template>

<script>
    import {
        FilterMatchMode
    } from 'primevue/api';

    export default {

        props: {

            customers: Object,
        },
        data() {
            return {
                editedData: null,
                editedNama: null,
                editedInstansi: null,
                editedEmail: null,
                editedNoWa: null,
                editDialog: false,
                tempData: null,
                deleteDialog: false,
                filters: {},
            }
        },
        created() {

            this.initFilters();
        },
     
        methods: {
            async kirimEditedUser() {
                console.log(this.editedNama)
                if (this.editedData !== "" &&
                    this.editedNama !== "" &&
                    this.editedInstansi !== "" &&
                    this.editedEmail !== "" &&
                    this.editedNoWa !== "") {

                    var editedData = {
                        editedId: this.editedData,
                        editedNama: this.editedNama,
                        editedInstansi: this.editedInstansi,
                        editedEmail: this.editedEmail,
                        editedNoWa: this.editedNoWa
                    }

                    console.log(editedData)
                    await this.$inertia.post('/submitediteduser', editedData, {

                        onStart: () => {
                            this.loading = true,
                                this.sending = true,
                                this.disabled = true
                        },
                        onProgress: (progressEvent) => {
                            //DATA TERSEBUT AKAN DI ASSIGN KE VARIABLE progressBar
                            this.progressBar = parseInt(Math.round((progressEvent.loaded * 100) /
                                progressEvent.total))
                            console.log(progressEvent.loaded)
                            console.log('Upload Progress: ', this.progressBar)
                        },

                        onSuccess: (response) => {
                            // Handle success event
                            console.log('onSuccess', response)
                            this.$toast.add({
                                severity: 'success',
                                summary: 'Yeay, Berhasil',
                                detail: 'User Berhasil Diedit :D',
                                life: 3000
                            });
                            this.loading = false,
                                this.sending = false,
                                this.disabled = false
                            this.editDialog = false
                        },
                        onError: (errors) => {
                            // Handle validation errors
                            console.log('onError', errors)
                            this.$toast.add({
                                severity: 'error',
                                summary: 'Ups, Gagal',
                                detail: 'User Gagal Diedit :(',
                                life: 3000
                            });
                            this.loading = false,
                                this.sending = false,
                                this.disabled = false
                            this.editDialog = false
                        },
                        onFinish: () => {
                            this.loading = false,
                                this.sending = false,
                                this.disabled = false
                            this.editDialog = false
                        }
                    })
                } else {
                    this.$toast.add({
                        severity: 'error',
                        summary: 'Ups, Ada Error',
                        detail: 'Pastikan semua field terisi',
                        life: 3000
                    });
                }
            },
            closeEditedDialog() {
                this.editDialog = false
            },
            editCustomerDialog(product) {
                console.log(product)
            },
            deleteCustomerDialog(data) {
                this.$confirm.require({
                    message: 'Do you want to delete this record?',
                    header: 'Delete Confirmation',
                    icon: 'pi pi-info-circle',
                    acceptClass: 'p-button-danger',
                    accept: () => {
                        console.log(data.id)
                        this.$inertia.post('/deletecustomer', data, {
                            onStart: () => {
                                this.sending = true
                            },
                            onProgress: (progressEvent) => {
                                //DATA TERSEBUT AKAN DI ASSIGN KE VARIABLE progressBar
                                this.progressBar = parseInt(Math.round((progressEvent.loaded *
                                        100) /
                                    progressEvent.total))
                                console.log(progressEvent.loaded)
                                console.log('Upload Progress: ', this.progressBar)
                            },

                            onSuccess: (response) => {
                                // Handle success event
                                console.log('onSuccess', response)
                                // this.$toast.add({severity:'success', summary: 'Yeay, Berhasil', detail:'Pesan Berhasil Dikirim', life: 3000});

                                this.sending = false

                            },
                            onError: (errors) => {
                                // Handle validation errors
                                console.log('onError', errors)

                                this.sending = false

                            },
                            onFinish: () => {

                                this.sending = false

                            }
                        })
                        this.$toast.add({
                            severity: 'info',
                            summary: 'Confirmed',
                            detail: 'Record deleted',
                            life: 3000
                        });
                    },
                    reject: () => {
                        this.$toast.add({
                            severity: 'error',
                            summary: 'Rejected',
                            detail: 'You have rejected',
                            life: 3000
                        });
                    }
                });


            },
            editDataDialog(data) {
                console.log(data.data.nama)
                this.editedData = data.data.id
                this.editedNama = data.data.nama
                this.editedInstansi = data.data.instansi
                this.editedEmail = data.data.email
                this.editedNoWa = data.data.no_wa
                this.editDialog = true
            },
            initFilters() {
                this.filters = {
                    'global': {
                        value: null,
                        matchMode: FilterMatchMode.CONTAINS
                    },
                }
            }
        },
    }

</script>
