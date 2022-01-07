<template>
    <div>
        <Card>
            <template #content>
                <div class="p-text-center grid justify-items-center p-card-title">

                    <img src="..\..\NORITA.png" alt="" class="w-56 h-14" srcset=""> <br>
                    BPS Provinsi Sulawesi Tengah
                </div>
            </template>

        </Card>

        <Card>
            <template #content>
                <div class="bg-gray-800 p-p-0 p-p-sm-1 p-p-md-2 p-p-lg-3">
                    <div class="p-fluid text-white bg-gray-800">
                        <Toast />
                        <Toast position="top-left" group="tl" />
                        <Toast position="bottom-left" group="bl" />
                        <Toast position="bottom-right" group="br" />
                        <div class="p-field p-grid">
                            <label for="firstname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0 ">Nama</label>
                            <div class="p-col-12 p-md-10">

                                <InputText v-model="ruleForm.nama" type="text" :class="classForm.nama"
                                    @input="changeNamaInput()" />
                                <small v-if="classForm.nama == 'p-invalid' " id="username2-help" class="p-error">Silakan
                                    masukkan
                                    nama</small>

                            </div>
                        </div>
                        <div class="p-field p-grid">
                            <label for="lastname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">Instansi</label>
                            <div class="p-col-12 p-md-10">

                                <InputText v-model="ruleForm.instansi" type="text" :class="classForm.instansi"
                                    @input="changeInstansiInput()" />
                                <small v-if="classForm.instansi == 'p-invalid' " id="username2-help"
                                    class="p-error">Silakan
                                    masukkan instansi</small>

                            </div>
                        </div>
                        <div class="p-field p-grid">
                            <label for="lastname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">Email</label>
                            <div class="p-col-12 p-md-10">
                                <InputText v-model="ruleForm.email" type="text" :class="classForm.email"
                                    @input="changeEmailInput()" />
                                <small v-if="classForm.email == 'p-invalid' " id="username2-help"
                                    class="p-error">Silakan
                                    masukkan email</small>
                            </div>
                        </div>
                        <div class="p-field p-grid">
                            <label for="lastname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">No WA</label>
                            <div class="p-col-12 p-md-10">
                                <InputText v-model="ruleForm.noWa" type="text" :class="classForm.noWa"
                                    @input="changeNoWaInput()" />
                                <small v-if="classForm.noWa == 'p-invalid' " id="username2-help" class="p-error">Silakan
                                    masukkan No Wa</small>
                            </div>
                        </div>
                        <div class="p-field p-grid">
                            <label for="lastname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">Kategori Publikasi</label>
                            <div class="p-col-12 p-md-10">

                                <MultiSelect v-model="ruleForm.kategori" :filter="true" :options="kategoriOptions"
                                    optionLabel="kategori" placeholder="Kategori Publikasi" display="chip"
                                    :class="classForm.kategori" @change="changeKategoriInput()" />
                                <!-- <InputText v-model="ruleForm.kategori" :class="classForm.kategori" type="text" /> -->
                                <small v-if="classForm.kategori == 'p-invalid' " id="username2-help"
                                    class="p-error">Silakan
                                    masukkan kategori</small>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="p-d-flex p-jc-center">
                        <div class="p-mr-2"><Button :disabled="disabled" label="Reset" @click="resetForm()"
                                icon="pi pi-spinner" iconPos="left" class="p-button-outlined p-d-block p-mx-auto" />
                        </div>
                        <div><Button :disabled="disabled" @click="kirimData()" label="Submit" icon="pi pi-send"
                                iconPos="left" class="p-d-block p-mx-auto " /> </div>
                    </div>
                    <Dialog header="Tunggu Ya" v-model:visible="loading" >
	<ProgressSpinner />
</Dialog>
	 

                </div>
            </template>
        </Card>

    </div>
</template>
<script>
    export default {
        data() {
            return {
                disabled: null,
                loading: false,
                classForm: {
                    nama: '',
                    instansi: '',
                    email: '',
                    noWa: '',
                    kategori: '',
                },
                ruleForm: {
                    nama: null,
                    instansi: null,
                    email: null,
                    noWa: null,
                    kategori: [],
                },
                kategoriOptions: [{
                        kategori: 'Inflasi',
                        value: 'Inflasi'
                    },
                    {
                        kategori: 'Tenaga Kerja',
                        value: 'Tenaga Kerja'
                    },
                    {
                        kategori: 'Ekspor-Impor',
                        value: 'Ekspor-Impor'
                    },
                    {
                        kategori: 'Industri',
                        value: 'Industri'
                    },
                    {
                        kategori: 'Pariwisata',
                        value: 'Pariwisata'
                    },
                    {
                        kategori: 'Nilai Tukar Petani',
                        value: 'Nilai Tukar Petani'
                    },
                    {
                        kategori: 'Kemiskinan',
                        value: 'Kemiskinan'
                    },
                    {
                        kategori: 'ITB-ITK',
                        value: 'ITB-ITK'
                    },
                    {
                        kategori: 'Indeks Pembangunan Manusia',
                        value: 'Indeks Pembangunan Manusia'
                    },
                    {
                        kategori: 'Sensus Pertanian',
                        value: 'Sensus Pertanian'
                    },
                    {
                        kategori: 'Sensus Penduduk',
                        value: 'Sensus Penduduk'
                    },
                    {
                        kategori: 'Sensus Ekonomi',
                        value: 'Sensus Ekonomi'
                    },
                    {
                        kategori: 'Produk Domestik Regional Bruto (Lapangan Usaha)',
                        value: 'Produk Domestik Regional Bruto (Lapangan Usaha)'
                    },
                    {
                        kategori: 'Tanaman Pangan',
                        value: 'Tanaman Pangan'
                    },
                    {
                        kategori: 'Hortikultura',
                        value: 'Hortikultura'
                    },
                    {
                        kategori: 'Potensi Desa',
                        value: 'Potensi Desa'
                    },
                    {
                        kategori: 'Lainnya',
                        value: 'Lainnya'
                    },
                ],
                rules: {
                    nama: [{
                            required: true,
                            message: 'Silakan masukkan nama',
                            trigger: 'blur'
                        },
                        {
                            min: 3,
                            max: 5,
                            message: 'Length should be 3 to 5',
                            trigger: 'blur'
                        }
                    ],
                    instansi: [{
                        required: true,
                        message: 'Silakan masukkan instansi',
                        trigger: 'blur'
                    }],
                    email: [{
                        required: true,
                        message: 'Silakan masukkan email',
                        trigger: 'change'
                    }],
                    noWa: [{
                        required: true,
                        message: 'Silakan masukkan noWa',
                        trigger: 'change'
                    }],
                    kategori: [{
                        type: 'array',
                        required: true,
                        message: 'Please select at least one activity type',
                        trigger: 'change'
                    }],

                }
            }
        },
        methods: {
            changeNamaInput() {
                this.classForm.nama = null
            },
            changeInstansiInput() {
                this.classForm.instansi = null
            },
            changeEmailInput() {
                this.classForm.email = null
            },
            changeNoWaInput() {
                this.classForm.noWa = null
            },
            changeKategoriInput() {
                this.classForm.kategori = null
            },
            resetForm() {
                this.ruleForm.nama = null
                this.ruleForm.instansi = null
                this.ruleForm.email = null
                this.ruleForm.noWa = null
                this.ruleForm.kategori = []

                this.classForm.nama = null
                this.classForm.instansi = null
                this.classForm.email = null
                this.classForm.noWa = null
                this.classForm.kategori = null
            },
            async kirimData() {
                if (this.cekForm()) {
                    await this.$inertia.post('/submitformregister', [this.ruleForm], {

                        onStart: () => {
                            this.loading = true,
                                this.sending = true,
                                this.disabled = 'disabled'
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
                                detail: 'Pendaftaran Telah Berhasil',
                                life: 3000
                            });
                            this.loading = false,
                                this.sending = false,
                                this.disabled = null
                        },
                        onError: (errors) => {
                            // Handle validation errors
                            console.log('onError', errors)
                        },
                        onFinish: () => {

                            this.sending = false, this.loading = false,
                                this.sending = false,
                                this.disabled = null
                        }
                    })
                } else {
                   
                    console.log('gagal')
                }
            },
            cekForm() {
                if (this.ruleForm.nama !== null &&
                    this.ruleForm.instansi !== null &&
                    this.ruleForm.email !== null &&
                    this.ruleForm.noWa !== null &&
                    this.ruleForm.kategori.length !== 0) {
                    return true;
                } else {
                    if (this.ruleForm.nama == null) {
                        this.classForm.nama = 'p-invalid'
                        console.log(this.ruleForm)
                    }
                    if (this.ruleForm.instansi == null) {
                        this.classForm.instansi = 'p-invalid'
                        console.log(this.ruleForm)
                    }
                    if (this.ruleForm.email == null) {
                        this.classForm.email = 'p-invalid'
                        console.log(this.ruleForm)
                    }
                    if (this.ruleForm.noWa == null) {
                        this.classForm.noWa = 'p-invalid'
                        console.log(this.ruleForm)
                    }
                    if (this.ruleForm.kategori.length == 0) {
                        this.classForm.kategori = 'p-invalid'
                        console.log(this.ruleForm.kategori.length)
                    }


                    this.$toast.add({
                        severity: 'error',
                        summary: 'Ups, Ada Yang Belum Terisi',
                        detail: 'Silakan isi semua field terlebih dahulu',
                        life: 3000
                    })
                    // alert('ada yg belum terisi')
                    return false;
                }
            }
        },
    }

</script>
