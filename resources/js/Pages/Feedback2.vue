<template>


    <div class="bg-gray-900">
        <el-container class="bg-gray-900">


            <el-main>
                <Toast />
                <Toast position="top-left" group="tl" />
                <Toast position="bottom-left" group="bl" />
                <Toast position="bottom-right" group="br" />

                <Card>
                    <template #content>
                        <div class="p-text-center grid justify-items-center p-card-title">
                            
                            <h3 v-if="active!==2 && active!==3">Survei Kepuasan Konsumen <br> BPS Provinsi Sulawesi Tengah
                            <!-- <img v-if="active!==2 || active !==3" src="..\..\bps2.png" alt="" class="w-56 h-14"
                                srcset=""> -->
                                </h3>
                            <img v-if="active==2 || active ==3" src="..\..\NORITA.png" alt="" class="w-56 h-14"
                                srcset="">
                        </div>
                    </template>

                </Card>
                <br>
                <Card>
                    <template #content>

                        <el-steps :active="active" align-center>
                            <el-step title="Feedback" @click="active = 1"></el-step>
                            <el-step title="Registrasi"></el-step>
                            <el-step title="Terima Kasih"></el-step>
                        </el-steps>

                        <el-card body-style="background-color: #1F2937;" v-if="active==1">
                            <p style="color:white;"> Untuk mengukur tingkat kepuasan konsumen terkait pelayanan publik
                                di BPS Provinsi Sulawesi Tengah,
                                kami mohon bantuan bapak/ibu untuk dapat memberikan penilaian terhadap beberapa
                                indikator berikut ini: </p> <br>
                            <div class="p-grid bg-gray-800 text-white ">
                                <div class="p-col-12 p-md-6 p-lg-6 p-text-left">
                                    <div class="feedback">1. Kualitas Data</div>
                                </div>
                                <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                                    <div class="">
                                        <Rating v-model="rate.kualitasData" :cancel="false" />
                                    </div>
                                </div>
                                <div class="p-col-12 p-md-6 p-lg-6 p-text-left">
                                    <div class="feedback">2. Pelayanan Data</div>
                                </div>
                                <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                                    <div class="">
                                        <Rating v-model="rate.pelayananData" :cancel="false" />
                                    </div>
                                </div>
                                <div class="p-col-12 p-md-6 p-lg-6 p-text-left">
                                    <div class="feedback">3. Akses Data</div>
                                </div>
                                <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                                    <div class="">
                                        <Rating v-model="rate.aksesData" :cancel="false" />
                                    </div>
                                </div>
                                <div class="p-col-12 p-md-6 p-lg-6 p-text-left">
                                    <div class="feedback">4. Sarana dan Prasarana Layanan</div>
                                </div>
                                <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                                    <div class="">
                                        <Rating v-model="rate.saranaPrasarana" :cancel="false" />
                                    </div>
                                </div>
                                <div class="p-col-12 p-md-6 p-lg-6 p-text-left">
                                    <div class="feedback">5. Data BPS Menjadi Rujukan Utama ?
                                    </div>
                                </div>
                                <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                                    <div class="box">
                                        <SelectButton v-model="rate.rujukan" :options="options" />
                                    </div>
                                </div>
                                <div class="p-col-12 p-md-6 p-lg-6 p-text-left">
                                    <div class="feedback">6. Ingin menerima notifikasi terkait rilis publikasi/Berita
                                        Resmi Statistik terbaru?
                                    </div>
                                </div>
                                <div class="p-col-12 p-md-6 p-lg-6 p-text-center">
                                    <div class="box">
                                        <SelectButton v-model="rate.updateInfo" :options="options" />
                                    </div>
                                </div>
                            </div>
                            <br>
                            <p style="color: white;">Keterangan <br>
                            <!-- <div class="p-grid">
            <div class="p-col-12 p-md-6 p-lg-3">
                <div class="box">p-col-12 p-md-6 p-lg-3</div>
            </div>
            <div class="p-col-12 p-md-6 p-lg-3">
                <div class="box">p-col-12 p-md-6 p-lg-3</div>
            </div>
            <div class="p-col-12 p-md-6 p-lg-3">
                <div class="box">p-col-12 p-md-6 p-lg-3</div>
            </div>
            <div class="p-col-12 p-md-6 p-lg-3">
                <div class="box">p-col-12 p-md-6 p-lg-3</div>
            </div>
        </div> -->
  <!-- <Rating :modelValue="5" :readonly="true" :stars="5" :cancel="false" /> <span>= sangat puas</span> -->
  
 ***** = sangat puas |
 ****  = puas |
 ***   = cukup |
 **    = tidak puas |
 *     = sangat tidak puas</p>
                        </el-card>

                        <el-card body-style="background-color: #1F2937;" v-if="active==2">
                            <div class="bg-gray-800">
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
                                            <small v-if="classForm.nama == 'p-invalid' " id="username2-help"
                                                class="p-error">Silakan masukkan
                                                nama</small>

                                        </div>
                                    </div>
                                    <div class="p-field p-grid">
                                        <label for="lastname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">Instansi</label>
                                        <div class="p-col-12 p-md-10">

                                            <InputText v-model="ruleForm.instansi" type="text"
                                                :class="classForm.instansi" @input="changeInstansiInput()" />
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

                                            <MultiSelect v-model="ruleForm.kategori" :filter="true"
                                                :options="kategoriOptions" optionLabel="kategori" placeholder="Kategori"
                                                display="chip" :class="classForm.kategori"
                                                @change="changeKategoriInput()" />
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

                        <el-card body-style="background-color: #1F2937;" v-if="active==3">
                            <div class="text-white">
                                Terima Kasih. Semoga Data Kami Bermanfaat :)
                            </div>
                        </el-card>

                        <el-row>


                            <el-button v-if="active > 1"
                                style="margin-top: 12px;border: 2px solid #64b5f6;background-color: #1F2937; color: #64b5f6;"
                                @click="prev">Prev step</el-button>
                            <el-button v-if="active != 3"
                                style="margin-top: 12px;border: 2px solid #64b5f6;background-color: #1F2937; color: #64b5f6;"
                                @click="next">Next step</el-button>
                            <el-button v-if="active === 3" :disabled="disabled"
                                style="margin-top: 12px;border: 2px solid #64b5f6;background-color: #1F2937; color: #64b5f6;"
                                @click="kirimData()">Kirim
                            </el-button>
                            <Dialog header="Tunggu Ya" :visible="loading">
                                <ProgressSpinner />
                            </Dialog>

                        </el-row>

                    </template>
                </Card>



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
                loading: false,
                disabled: false,
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
            async kirimData() {
                await this.$inertia.post('/submitfeedback', [this.rate, this.ruleForm], {

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
                            detail: 'Feedback Berhasil Dikirim :D',
                            life: 3000
                        });
                        this.loading = false,
                            this.sending = false,
                            this.disabled = false
                    },
                    onError: (errors) => {
                        // Handle validation errors
                        console.log('onError', errors)
                        this.loading = false,
                            this.sending = false,
                            this.disabled = false
                    },
                    onFinish: () => {
                        this.loading = false,
                            this.sending = false,
                            this.disabled = false
                    }
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
                } else {
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

    .feedback {
        margin-left: 100px;

    }

    @media (max-width:760px) {
        .feedback {
            margin-left: 0px;
        }

    }

</style>
