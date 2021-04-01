
<template>
<el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="120px" class="demo-ruleForm">
  <el-form-item label="Judul" prop="judul">
    <el-input v-model="ruleForm.judul"></el-input>
  </el-form-item>
  <el-form-item label="Abstrak" prop="abstrak">
    <el-input type="textarea" v-model="ruleForm.abstrak"></el-input>
  </el-form-item>
  <el-form-item label="Infografis" prop="infografis">
    <el-input v-model="ruleForm.infografis"></el-input>
  </el-form-item>
  <el-form-item label="Link" prop="link">
    <el-input v-model="ruleForm.link"></el-input>
  </el-form-item>
  <el-form-item label="Kategori" prop="kategori">
    <el-select multiple v-model="ruleForm.kategori" placeholder="Kategori">
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
    <el-button type="primary" @click="submitForm2('ruleForm')">Kirim</el-button>
  </el-form-item>
</el-form>
</template>

<script>
  export default {
    data() {
      return {
        ruleForm: {
          judul: '',
          abstrak: '',
          infografis: '',
          link: '',
          kategori: [],
        },
        rules: {
          judul: [
            { required: true, message: 'Silakan masukkan judul', trigger: 'blur' },
            
          ],
          abstrak: [
            { required: true, message: 'Silakan masukkan abstrak', trigger: 'change' }
          ],
          infografis: [
            { required: true, message: 'Silakan masukkan infografis', trigger: 'change' }
          ],
          link: [
            { required: true, message: 'Silakan masukkan link', trigger: 'change' }
          ],
          kategori: [
            { type: 'array', required: true, message: 'Please select at least one activity type', trigger: 'change' }
          ],

        }
      };
    },
    methods: {
      async submitForm2(formName) {

        await this.$refs[formName].validate((valid) => {
          if (valid) {
            this.$inertia.post('/submitform', this.ruleForm, {

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
                        },
                        onError: (errors) => {
                            // Handle validation errors
                            console.log('onError', errors)
                        },
                        onFinish: () => this.sending = false,
                    })    
          } else {
            console.log('error submit!!');
            return false;
          }
        });
        
      },
       submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            
          } else {
            console.log('error submit!!');
            return false;
          }
        });
      },
      resetForm(formName) {
        this.$refs[formName].resetFields();
      }
    }
  }
</script>

<style>

</style>
