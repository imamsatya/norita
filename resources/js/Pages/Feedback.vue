<template>


    <div>
        <el-container>
            <el-header height="30px">
                <div aplign-center>Kepuasan Konsumen</div>

            </el-header>

            <el-main>
                <el-steps :active="active" finish-status="success" align-center>
                    <el-step title="Feedback" @click="active = 1"></el-step>
                    <el-step title="Registrasi"></el-step>
                    <el-step title="Terima Kasih" @click="active = 3"></el-step>
                </el-steps>

                <el-card v-if="active==1">

                    <el-row :gutter="20" type="flex" justify="space-around">
                        <el-col :xs="12" :sm="12" :md="12" :lg="6">1. Kualitas Data </el-col>
                        <el-col :xs="12" :sm="12" :md="12" :lg="6">
                            <el-rate allow-half high-threshold="8" v-model="rate.kualitasData"></el-rate>
                        </el-col>
                    </el-row> <br>

                    <el-row :gutter="20" type="flex" justify="space-around">
                        <el-col :xs="12" :sm="12" :md="12" :lg="6">2. Pelayanan Data </el-col>
                        <el-col :xs="12" :sm="12" :md="12" :lg="6">
                            <el-rate allow-half high-threshold="8" v-model="rate.pelayananData"></el-rate>
                        </el-col>
                    </el-row> <br>

                    <el-row :gutter="20" type="flex" justify="space-around">
                        <el-col :xs="12" :sm="12" :md="12" :lg="6">3. Akses Data </el-col>
                        <el-col :xs="12" :sm="12" :md="12" :lg="6">
                            <el-rate allow-half high-threshold="8" v-model="rate.aksesData"></el-rate>
                        </el-col>
                    </el-row> <br>

                    <el-row :gutter="20" type="flex" justify="space-around">
                        <el-col :xs="12" :sm="12" :md="12" :lg="6">4. Sarana dan Prasarana Layanan </el-col>
                        <el-col :xs="12" :sm="12" :md="12" :lg="6">
                            <el-rate allow-half high-threshold="8" v-model="rate.saranaPrasarana"></el-rate>
                        </el-col>
                    </el-row> <br>

                    <el-row :gutter="20" type="flex" justify="space-around">
                        <el-col :xs="12" :sm="12" :md="12" :lg="6">5. Data BPS Menjadi Rujukan Utama ? </el-col>
                        <el-col :xs="12" :sm="12" :md="12" :lg="6">
                            <el-radio-group v-model="rate.rujukan">
                                <el-radio-button label="Iya"></el-radio-button>
                                <el-radio-button label="Tidak"></el-radio-button>

                            </el-radio-group>
                        </el-col>
                    </el-row> <br>

                    <el-row :gutter="20" type="flex" justify="space-around">
                        <el-col :xs="12" :sm="12" :md="12" :lg="6">6. Ingin Menerima Update Info BPS ? </el-col>
                        <el-col :xs="12" :sm="12" :md="12" :lg="6">
                            <el-radio-group v-model="rate.updateInfo">
                                <el-radio-button label="Iya"></el-radio-button>
                                <el-radio-button label="Tidak"></el-radio-button>

                            </el-radio-group>
                        </el-col>
                    </el-row> <br>

                </el-card>

                <el-card v-if="active==2">
                      
                    <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="300px" class="demo-ruleForm">
                       
                        <el-form-item label="Nama" prop="nama">
                            <el-input v-model="ruleForm.nama"></el-input>
                        </el-form-item>
                        <el-form-item label="Instansi" prop="instansi">
                            <el-input v-model="ruleForm.instansi"></el-input>
                        </el-form-item>
                        <el-form-item label="email" prop="email">
                            <el-input type="email"  v-model="ruleForm.email"></el-input>
                        </el-form-item>
                        <el-form-item label="No WA" prop="noWa">
                            <el-input v-model="ruleForm.noWa"></el-input>
                        </el-form-item>
                        <el-form-item label="Kategori yang diinginkan" prop="kategori">
                            <el-select multiple v-model="ruleForm.kategori" placeholder="Kategori" width="300px">
                                <el-option label="Inflasi" value="inflasi"></el-option>
                                <el-option label="Tenaga Kerja" value="tenaga kerja"></el-option>
                                <el-option label="Ekspor-Impor" value="ekspor impor"></el-option>
                                <el-option label="Industri" value="industri"></el-option>
                                <el-option label="Pariwisata" value="pariwisata"></el-option>
                                <el-option label="Nilai Tukar Petani" value="nilai tukar petani"></el-option>
                                <el-option label="Kemiskinan" value="kemiskinan"></el-option>
                                <el-option label="ITB-ITK" value="itb itk"></el-option>
                                <el-option label="Indeks Pembangunan Manusia" value="indeks pembangunan manusia"></el-option>
                                <el-option label="Sensus Pertanian" value="sensus pertanian"></el-option>
                                <el-option label="Sensus Penduduk" value="sensus penduduk"></el-option>
                                <el-option label="Sensus Ekonomi" value="sensus ekonomi"></el-option>
                                <el-option label="Produk Domestik Regional Bruto (Lapangan Usaha)" value="produk domestik regional bruto (lapangan usaha)"></el-option>
                                <el-option label="Tanaman Pangan" value="tanaman pangan"></el-option>
                                <el-option label="Hortikultura" value="hortikultura"></el-option>
                                <el-option label="Potensi Desa" value="potensi desa"></el-option>
                                <el-option label="Lainnya" value="lainnya"></el-option>
                            </el-select>
                        </el-form-item>

                        <br>
                        <el-form-item>
                            <el-button @click="resetForm('ruleForm')">Reset</el-button>
                        </el-form-item>
                    </el-form>
                      

                </el-card>

                <el-card v-if="active==3">
                    Terima Kasih. Semoga Data Kami Bermanfaat :)
                </el-card>

                <el-row>
                    <el-button v-if="active > 1" style="margin-top: 12px;" @click="prev">Prev step</el-button>
                    <el-button v-if="active != 3" style="margin-top: 12px;" @click="next">Next step</el-button>
                    <el-button v-if="active === 3" style="margin-top: 12px;" @click="next">Kirim</el-button>
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
                active: 1,
                rate: {
                    kualitasData: 0,
                    pelayananData: 0,
                    aksesData: 0,
                    saranaPrasarana: 0,
                    rujukan: null,
                    updateInfo: null
                },


                 ruleForm: {
          nama: '',
          instansi: '',
          email: '',
          noWa: '',
          kategori: [],
        },
        rules: {
          nama: [
            { required: true, message: 'Silakan masukkan nama', trigger: 'blur' },
            { min: 3, max: 5, message: 'Length should be 3 to 5', trigger: 'blur' }
          ],
          instansi: [
            { required: true, message: 'Silakan masukkan instansi', trigger: 'blur' }
          ],
          email: [
            { required: true, message: 'Silakan masukkan email', trigger: 'change' }
          ],
          noWa: [
            { required: true, message: 'Silakan masukkan noWa', trigger: 'change' }
          ],
          kategori: [
            { type: 'array', required: true, message: 'Please select at least one activity type', trigger: 'change' }
          ],

        }
            };
        },

        methods: {
             resetForm(formName) {
        this.$refs[formName].resetFields();
      },
            next() {
                if (this.active++ > 2) this.active = 1;
            },
            prev() {
                if (this.active-- < 1) this.active = 1;
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
