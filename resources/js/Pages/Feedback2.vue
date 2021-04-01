<template>


    <div>
        <el-container>
            <el-header height="30px">
                <div align-center>Kepuasan Konsumen</div>

            </el-header>

            <el-main>
                <Toast />
                <Toast position="top-left" group="tl" />
                <Toast position="bottom-left" group="bl" />
                <Toast position="bottom-right" group="br" />
                <el-steps :active="active" align-center>
                    <el-step title="Feedback" @click="active = 1"></el-step>
                    <el-step title="Registrasi"></el-step>
                    <el-step title="Terima Kasih"></el-step>
                </el-steps>

                <el-card v-if="active==1">

                    <div class="p-grid p-jc-around">
                        <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                            <div class="">1. Kualitas Data</div>
                        </div>
                        <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                            <div class="">
                                <Rating v-model="rate.kualitasData" :cancel="false" />
                            </div>
                        </div>
                        <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                            <div class="">2. Pelayanan Data</div>
                        </div>
                        <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                            <div class="">
                                <Rating v-model="rate.pelayananData" :cancel="false" />
                            </div>
                        </div>
                        <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                            <div class="">3. Akses Data</div>
                        </div>
                        <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                            <div class="">
                                <Rating v-model="rate.aksesData" :cancel="false" />
                            </div>
                        </div>
                        <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                            <div class="">4. Sarana dan Prasarana Layanan</div>
                        </div>
                        <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                            <div class="">
                                <Rating v-model="rate.saranaPrasarana" :cancel="false" />
                            </div>
                        </div>
                        <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                            <div class="box">5. Data BPS Menjadi Rujukan Utama ?</div>
                        </div>
                        <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                            <div class="box">
                                <SelectButton v-model="rate.rujukan" :options="options" />
                            </div>
                        </div>
                        <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                            <div class="box">6. Ingin Menerima Update Info BPS ?</div>
                        </div>
                        <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                            <div class="box">
                                <SelectButton v-model="rate.updateInfo" :options="options" />
                            </div>
                        </div>
                    </div>
                </el-card>



                <el-card v-if="active==2">
                    <div>
                        <div class="p-fluid text-gray-600">
                            <Toast />
                            <Toast position="top-left" group="tl" />
                            <Toast position="bottom-left" group="bl" />
                            <Toast position="bottom-right" group="br" />
                            <div class="p-field p-grid">
                                <label for="firstname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0 ">Nama</label>
                                <div class="p-col-12 p-md-10">
                                    
                                    <InputText v-model="ruleForm.nama" type="text" :class="classForm.nama"
                                        @input="changeNamaInput()" />
                                    <small v-if="classForm.nama == 'p-invalid' " id="username2-help"
                                        class="p-error">Silakan masukkan
                                        nama</small>

                                </div>
                            </div>
                            <div class="p-field p-grid">
                                <label for="lastname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">Instansi</label>
                                <div class="p-col-12 p-md-10">

                                    <InputText v-model="ruleForm.instansi" type="text" :class="classForm.instansi"
                                        @input="changeInstansiInput()" />
                                    <small v-if="classForm.instansi == 'p-invalid' " id="username2-help"
                                        class="p-error">Silakan masukkan instansi</small>

                                </div>
                            </div>
                            <div class="p-field p-grid">
                                <label for="lastname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">Email</label>
                                <div class="p-col-12 p-md-10">
                                    <InputText v-model="ruleForm.email" type="text" :class="classForm.email"
                                        @input="changeEmailInput()" />
                                    <small v-if="classForm.email == 'p-invalid' " id="username2-help"
                                        class="p-error">Silakan masukkan email</small>
                                </div>
                            </div>
                            <div class="p-field p-grid">
                                <label for="lastname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">No WA</label>
                                <div class="p-col-12 p-md-10">
                                    <InputText v-model="ruleForm.noWa" type="text" :class="classForm.noWa"
                                        @input="changeNoWaInput()" />
                                    <small v-if="classForm.noWa == 'p-invalid' " id="username2-help"
                                        class="p-error">Silakan masukkan No Wa</small>
                                </div>
                            </div>
                            <div class="p-field p-grid">
                                <label for="lastname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">Kategori</label>
                                <div class="p-col-12 p-md-10">

                                    <MultiSelect v-model="ruleForm.kategori" :filter="true" :options="kategoriOptions"
                                        optionLabel="kategori" placeholder="Kategori" display="chip"
                                        :class="classForm.kategori" @change="changeKategoriInput()" />
                                    <!-- <InputText v-model="ruleForm.kategori" :class="classForm.kategori" type="text" /> -->
                                    <small v-if="classForm.kategori == 'p-invalid' " id="username2-help"
                                        class="p-error">Silakan masukkan kategori</small>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>

                        <div class="p-d-flex p-jc-center">
                            <div class="p-mr-2"><Button label="Reset" @click="resetForm()" icon="pi pi-spinner"
                                    iconPos="left" class="p-button-outlined p-d-block p-mx-auto" /> </div>

                        </div>

                    </div>

                </el-card>

                <el-card v-if="active==3">
                    Terima Kasih. Semoga Data Kami Bermanfaat :)
                </el-card>

                <el-row>
                    <el-button v-if="active > 1" style="margin-top: 12px;" @click="prev">Prev step</el-button>
                    <el-button v-if="active != 3" style="margin-top: 12px;" @click="next">Next step</el-button>
                    <el-button v-if="active === 3" style="margin-top: 12px;" @click="kirimData()">Kirim</el-button>
                </el-row>



            </el-main>

            <el-footer>
            </el-footer>
        </el-container>






    </div>



</template>

<script>
    export default {
        data() {
            return {
                classForm: {
                    nama: '',
                    instansi: '',
                    email: '',
                    noWa: '',
                    kategori: '',
                },
                active: 1,
                rate: {
                    kualitasData: 0,
                    pelayananData: 0,
                    aksesData: 0,
                    saranaPrasarana: 0,
                    rujukan: null,
                    updateInfo: null
                },
                options: ['Tidak', 'Iya'],
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
            };
        },

        methods: {
            changeNamaInput(){
         this.classForm.nama = null
      },
       changeInstansiInput(){
        this.classForm.instansi = null      
      },
      changeEmailInput(){
        this.classForm.email = null      
      },
      changeNoWaInput(){
        this.classForm.noWa = null      
      },
      changeKategoriInput(){
        this.classForm.kategori = null      
      },
            async kirimData() {
                await this.$inertia.post('/submitfeedback', [this.rate, this.ruleForm], {

                    onStart: () => this.sending = true,
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
                            detail: 'Pesan Berhasil Dikirim',
                            life: 3000
                        });
                    },
                    onError: (errors) => {
                        // Handle validation errors
                        console.log('onError', errors)
                    },
                    onFinish: () => this.sending = false,
                })
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
            next() {
                //step1
                if (this.active == 1) {
                    console.log('active 1')

                    if (this.rate.kualitasData != 0 &&
                        this.rate.pelayananData != 0 &&
                        this.rate.aksesData != 0 &&
                        this.rate.saranaPrasarana != 0 &&
                        this.rate.rujukan != null &&
                        this.rate.updateInfo != null) {
                        if (this.rate.updateInfo == 'Tidak') {

                            this.active = 3
                        } else {
                            if (this.active++ > 2) this.active = 1;
                        }
                    } else {
                        this.$toast.add({
                            severity: 'error',
                            summary: 'Ups, Ada Yang Belum Terisi',
                            detail: 'Silakan isi semua feedback terlebih dahulu',
                            life: 3000
                        })
                        // alert('ada yg belum terisi')
                    }

                } 
                
                //step 2
                else if (this.active == 2) {
                    if (this.ruleForm.nama !== null &&
                        this.ruleForm.instansi !== null &&
                        this.ruleForm.email !== null &&
                        this.ruleForm.noWa !== null &&
                        this.ruleForm.kategori.length !== 0) {
                       if (this.active++ > 2) this.active = 1;
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
                            detail: 'Silakan isi semua feedback terlebih dahulu',
                            life: 3000
                        })
                        // alert('ada yg belum terisi')
                    }
                } 
                
                else {
                    if (this.active++ > 2) this.active = 1;
                }

                // if(this.active++ > 2) this.active = 1;
            },
            prev() {
                if (this.active == 3 && this.rate.updateInfo == 'Tidak') {
                    this.active = 1
                } else {
                    if (this.active-- < 1) this.active = 1;
                }

            }
        }
    }

</script>

<style>
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .text {
        font-size: 14px;
    }

    .item {
        margin-bottom: 18px;
    }

    .box-card {
        width: 900px;

    }

    .el-col {
        border-radius: 4px;
    }

    .bg-purple-dark {
        background: #99a9bf;
    }

    .bg-purple {
        background: #d3dce6;
    }

    .bg-purple-light {
        background: #e5e9f2;
    }

    .grid-content {
        border-radius: 4px;
        min-height: 36px;
    }

</style>
