<template>
    <div>
        <div class="p-fluid text-white">
            <Toast />
            <Toast position="top-left" group="tl" />
            <Toast position="bottom-left" group="bl" />
            <Toast position="bottom-right" group="br" />
            <div class="p-field p-grid">
                <label for="firstname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0 ">Judul Publikasi</label>
                <div class="p-col-9 p-md-7">


                    <!-- <MultiSelect :filter="true" v-model="selectedGroupedCities" :options="kategoriOptions2" optionLabel="label"
                        optionGroupLabel="label" optionGroupChildren="items">
                    </MultiSelect> -->

                    <CascadeSelect v-model="selectedJudul" :class="classForm.judul" :options="kategoriOptions3"
                        optionLabel="cname" optionGroupLabel="kategori" :optionGroupChildren="['judulKategori']"
                        style="maxWidth: 25rem" placeholder="Pilih Judul Publikasi" />
                    <small v-if="classForm.judul == 'p-invalid' " id="username2-help" class="p-error">Silakan masukkan
                        judul publikasi</small>



                    <!-- <InputText v-model="ruleForm.judul" type="text" :class="classForm.judul"
                         />
                    <small v-if="classForm.judul == 'p-invalid' " id="username2-help" class="p-error">Silakan masukkan
                        judul</small> -->

                </div>
                <div class="p-col-3 p-md-3 ">
                    <span class="p-float-label">
                        <InputText id="inputtext" type="text" v-model="keteranganTambahanJudul" />
                        <label for="inputtext">Keterangan Tambahan Judul</label>
                    </span>


                </div>
            </div>
            <div class="p-field p-grid">
                <label for="lastname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">Abstrak</label>
                <div class="p-col-12 p-md-10">

                    <Textarea v-model="ruleForm.abstrak" :autoResize="true" rows="5" cols="30"
                        :class="classForm.abstrak" @input="changeAbstrakInput()" />
                    <small v-if="classForm.abstrak == 'p-invalid' " id="username2-help" class="p-error">Silakan masukkan abstrak</small>

                </div>
            </div>
            <div class="p-field p-grid">
                <label for="lastname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">Infografis</label>
                <div class="p-col-12 p-md-10">
                    <InputText v-model="ruleForm.infografis" type="text" :class="classForm.infografis" @input="changeInfografisInput()" />
                    <small v-if="classForm.infografis == 'p-invalid' " id="username2-help" class="p-error">Silakan masukkan infografis</small>
                </div>
            </div>
            <div class="p-field p-grid">
                <label for="lastname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">Link</label>
                <div class="p-col-12 p-md-10">
                    <InputText v-model="ruleForm.link" type="text" :class="classForm.link" @input="changeLinkInput()" />
                    <small v-if="classForm.link == 'p-invalid' " id="username2-help" class="p-error">Silakan masukkan link</small>
                </div>
            </div>
            <!-- <div class="p-field p-grid">
                <label for="lastname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">Kategori</label>
                <div class="p-col-12 p-md-10">
                    
                    <MultiSelect v-model="ruleForm.kategori" :filter="true" :options="kategoriOptions" optionLabel="kategori" placeholder="Kategori" display="chip" :class="classForm.kategori" @change="changeKategoriInput()"/>
                    
                    <small v-if="classForm.kategori == 'p-invalid' " id="username2-help" class="p-error">Silakan masukkan kategori</small>
                </div>
            </div>    -->
        </div>  
        <br>
        <br>
 
        <div class="p-d-flex p-jc-center">
            <div  class="p-mr-2"><Button :disabled="disabled" label="Reset" @click="resetForm2()" icon="pi pi-spinner" iconPos="left" class="p-button-outlined p-d-block p-mx-auto" /> </div>
            <div><Button :disabled="disabled" @click="submitForm2(ruleForm)" label="Submit" icon="pi pi-send" iconPos="left" class="p-d-block p-mx-auto " /> </div>
        </div>
      <Dialog header="Tunggu Ya" :visible="loading" >
	<ProgressSpinner />
</Dialog>
	 


       

    </div>

</template>

<script>
  export default {
    data() {
      return {
          disabled: null,
          loading: false,
        selectedKategori3: null,
            countries: [
                {
                    name: 'Australia',
                    code: 'AU',
                    states: [
                        {
                            name: 'New South Wales',
                            cities: [
                                {cname: 'Sydney', code: 'A-SY'},
                                {cname: 'Newcastle', code: 'A-NE'},
                                {cname: 'Wollongong', code: 'A-WO'}
                            ]
                        },
                        {
                            name: 'Queensland',
                            cities: [
                                {cname: 'Brisbane', code: 'A-BR'},
                                {cname: 'Townsville', code: 'A-TO'}
                            ]
                        },
                        
                    ]
                },
                {
                    name: 'Canada', 
                    code: 'CA',
                    states: [
                        {
                            name: 'Quebec',
                            cities: [
                                {cname: 'Montreal', code: 'C-MO'},
                                {cname: 'Quebec City', code: 'C-QU'}
                            ]
                        },
                        {
                            name: 'Ontario',
                            cities: [
                                {cname: 'Ottawa', code: 'C-OT'},
                                {cname: 'Toronto', code: 'C-TO'}
                            ]
                        },
                        
                    ]
                },
                {
                    name: 'United States',
                    code: 'US',
                    states: [
                        {
                            name: 'California',
                            cities: [
                                {cname: 'Los Angeles', code: 'US-LA'},
                                {cname: 'San Diego', code: 'US-SD'},
                                {cname: 'San Francisco', code: 'US-SF'}
                            ]
                        },
                        {
                            name: 'Florida',
                            cities: [
                                {cname: 'Jacksonville', code: 'US-JA'},
                                {cname: 'Miami', code: 'US-MI'},
                                {cname: 'Tampa', code: 'US-TA'},
                                {cname: 'Orlando', code: 'US-OR'}
                            ]
                        },
                        {
                            name: 'Texas',
                            cities: [
                                {cname: 'Austin', code: 'US-AU'},
                                {cname: 'Dallas', code: 'US-DA'},
                                {cname: 'Houston', code: 'US-HO'}
                            ]
                        }
                    ]
                }
            ],
            selectedKategori: null,
            kategoriOptions3: [
                {kategori: 'Umum',
                    code: 'AU',
                    judulKategori: [
                                {cname: 'Provinsi Sulawesi Tengah Dalam Angka', kategori: 'Umum'},
                                {cname: 'Statistik Daerah Provinsi Sulawesi Tengah', kategori: 'Umum'},
                                {cname: 'Katalog Publikasi BPS Provinsi Sulawesi Tengah', kategori: 'Umum'},
                                {cname: 'Indikator Makro Sosial Ekonomi Provinsi Sulawesi Tengah', kategori: 'Umum'}
                            ]
                },
                {kategori: 'Produk Domestik Regional Bruto',
                    code: 'AU',
                    judulKategori: [
                                {cname: 'Produk Domestik Regional Bruto Provinsi Sulawesi Tengah Menurut Lapangan Usaha', kategori: 'Produk Domestik Regional Bruto'},
                                {cname: 'Produk Domestik Regional Bruto Provinsi Sulawesi Tengah Menurut Pengeluaran', kategori: 'Produk Domestik Regional Bruto'},
                                {cname: 'Produk Domestik Regional Bruto Kabupaten/Kota di Sulawesi Tengah Menurut Lapangan Usaha', kategori: 'Produk Domestik Regional Bruto'},
                                {cname: 'Berita Resmi Statistik Pertumbuhan Ekonomi Provinsi Sulawesi Tengah', kategori: 'Produk Domestik Regional Bruto'}
                            ]
                },
                {kategori: 'Nilai Tukar Petani',
                    code: 'AU',
                    judulKategori: [
                                {cname: 'Nilai Tukar Petani Provinsi Sulawesi Tengah', kategori: 'Nilai Tukar Petani'},
                                {cname: 'Berita Resmi Statistik Nilai Tukar Petani Provinsi Sulawesi Tengah', kategori: 'Nilai Tukar Petani'},
                            ]
                },
                {kategori: 'Inflasi',
                    code: 'AU',
                    judulKategori: [
                                {cname: 'Statistik Harga Konsumen Provinsi Sulawesi Tengah', kategori: 'Inflasi'},
                                {cname: 'Berita Resmi Statistik Inflasi Gabungan Dua Kota di Provinsi Sulawesi Tengah', kategori: 'Inflasi'},
                            ]
                },
                  {kategori: 'Kependudukan',
                    code: 'AU',
                    judulKategori: [
                                {cname: 'Statistik Kependudukan Provinsi Sulawesi Tengah', kategori: 'Kependudukan'},
                            ]
                },
                {kategori: 'Tenaga Kerja',
                    code: 'AU',
                    judulKategori: [
                                {cname: 'Indikator Ketenagakerjaan Provinsi Sulawesi Tengah', kategori: 'Tenaga Kerja'},
                                {cname: 'Berita Resmi Statistik Keadaan Ketenagakerjaan Provinsi Sulawesi Tengah', kategori: 'Tenaga Kerja'},
                            ]
                },
                {kategori: 'Ekspor-Impor',
                    code: 'AU',
                    judulKategori: [
                                {cname: 'Statistik Perdagangan Luar Negeri Provinsi Sulawesi Tengah', kategori: 'Ekspor-Impor'},
                                {cname: 'Berita Resmi Statistik Ekspor Impor Provinsi Sulawesi Tengah', kategori: 'Ekspor-Impor'},
                            ]
                },                
                {kategori: 'Sosial',
                    code: 'AU',
                    judulKategori: [
                                {cname: 'Statistik Perumahan dan Konsumsi Rumah Tangga Provinsi Sulawesi Tengah', kategori: 'Sosial'},
                                {cname: 'Statistik Politik dan Keamanan Provinsi Sulawesi Tengah', kategori: 'Sosial'},
                                {cname: 'Indikator Kesejahteraan Rakyat Provinsi Sulawesi Tengah', kategori: 'Sosial'},
                                {cname: 'Statistik Kesejahteraan Rakyat Provinsi Sulawesi Tengah', kategori: 'Sosial'},

                            ]
                },
                {kategori: 'Transportasi',
                    code: 'AU',
                    judulKategori: [
                                {cname: 'Statistik Perhubungan Provinsi Sulawesi Tengah', kategori: 'Transportasi'},
                            ]
                },
                {kategori: 'Pertanian',
                    code: 'AU',
                    judulKategori: [
                                {cname: 'Statistik Pemotongan Ternak Provinsi Sulawesi Tengah', kategori: 'Pertanian'},
                                {cname: 'Indikator Pertanian Provinsi Sulawesi Tengah', kategori: 'Pertanian'},
                                {cname: 'Luas Panen dan Produksi Padi Provinsi Sulawesi Tengah', kategori: 'Pertanian'},
                                {cname: 'Berita Resmi Statistik Luas Panen dan Produksi Padi di Provinsi Sulawesi Tengah', kategori: 'Pertanian'},
                            ]
                },
                {kategori: 'Industri',
                    code: 'AU',
                    judulKategori: [
                                {cname: 'Direktori Perusahaan Konstruksi Provinsi Sulawesi Tengah', kategori: 'Industri'},
                                {cname: 'Direktori Industri Manufaktur Besar dan Sedang Provinsi Sulawesi Tengah', kategori: 'Industri'},
                                {cname: 'Statistik Industri Besar dan Sedang Provinsi Sulawesi Tengah', kategori: 'Industri'},
                            ]
                },
                {kategori: 'Pariwisata',
                    code: 'AU',
                    judulKategori: [
                                {cname: 'Statistik Perhotelan Provinsi Sulawesi Tengah', kategori: 'Pariwisata'},
                                {cname: 'Berita Resmi Statistik Tingkat Penggunaan Sarana Akomodasi dan Transportasi di Sulawesi Tengah', kategori: 'Pariwisata'},
                            ]
                },
                {kategori: 'Indeks Pembangunan Manusia',
                    code: 'AU',
                    judulKategori: [
                                {cname: 'Indeks Pembangunan Manusia Provinsi Sulawesi Tengah', kategori: 'Indeks Pembangunan Manusia'},
                                {cname: 'Berita Resmi Statistik Indeks Pembangunan Manusia', kategori: 'Indeks Pembangunan Manusia'},
                            ]
                },
                {kategori: 'Potensi Desa',
                    code: 'AU',
                    judulKategori: [
                                {cname: 'Berita Resmi Statistik Potensi Desa di Sulawesi Tengah', kategori: 'Potensi Desa'},
                            ]
                },
                {kategori: 'Kemiskinan',
                    code: 'AU',
                    judulKategori: [
                                {cname: 'Berita Resmi Statistik Profil Kemiskinan di Sulawesi Tengah', kategori: 'Kemiskinan'},
                                {cname: 'Berita Resmi Statistik Gini Ratio Sulawesi Tengah', kategori: 'Kemiskinan'},
                            ]
                },
                {kategori: 'Lainnya',
                    code: 'AU',
                    judulKategori: [
                                {cname: 'Statistik Keuangan Daerah Provinsi Sulawesi Tengah', kategori: 'Lainnya'},
                                {cname: 'Statistik Air Bersih Provinsi Sulawesi Tengah', kategori: 'Lainnya'},
                            ]
                }

                


                
                ],
            kategoriOptions2:[{
                label: 'Umum', code: 'DE', 
                items: [
                    {label: 'Provinsi Sulawesi Tengah Dalam Angka', value: 'Berlin'},
                    {label: 'Statistik Daerah Provinsi Sulawesi Tengah', value: 'Frankfurt'},
                    {label: 'Hamburg', value: 'Hamburg'},
                    {label: 'Munich', value: 'Munich'}
                ]
            }],
       
        kategoriOptions: [
			{kategori: 'Inflasi', value: 'Inflasi'},
			{kategori: 'Tenaga Kerja', value: 'Tenaga Kerja'},
			{kategori: 'Ekspor-Impor', value: 'Ekspor-Impor'},
			{kategori: 'Industri', value: 'Industri'},
			{kategori: 'Pariwisata', value: 'Pariwisata'},
			{kategori: 'Nilai Tukar Petani', value: 'Nilai Tukar Petani'},
			{kategori: 'Kemiskinan', value: 'Kemiskinan'},
			{kategori: 'ITB-ITK', value: 'ITB-ITK'},
      {kategori: 'Indeks Pembangunan Manusia', value: 'Indeks Pembangunan Manusia'},
      {kategori: 'Sensus Pertanian', value: 'Sensus Pertanian'},
      {kategori: 'Sensus Penduduk', value: 'Sensus Penduduk'},
      {kategori: 'Sensus Ekonomi', value: 'Sensus Ekonomi'},
      {kategori: 'Produk Domestik Regional Bruto (Lapangan Usaha)', value: 'Produk Domestik Regional Bruto (Lapangan Usaha)'},
      {kategori: 'Tanaman Pangan', value: 'Tanaman Pangan'},
      {kategori: 'Hortikultura', value: 'Hortikultura'},
      {kategori: 'Potensi Desa', value: 'Potensi Desa'},
      {kategori: 'Lainnya', value: 'Lainnya'},
		],
        keteranganTambahanJudul: null,
         classForm: {
          judul: '',
          abstrak: '',
          infografis: '',
          link: '',
          kategori: '',
        },
        selectedJudul: null,
        ruleForm: {
          judul: null,
          abstrak: null,
          infografis: null,
          link: null,
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
      changeJudulInput(){
         this.classForm.judul = null
      },
       changeAbstrakInput(){
        this.classForm.abstrak = null      
      },
      changeInfografisInput(){
        this.classForm.infografis = null      
      },
      changeLinkInput(){
        this.classForm.link = null      
      },
      changeKategoriInput(){
        this.classForm.kategori = null      
      },
        submitForm2(ruleForm) {
            console.log('selectedJudul', this.selectedJudul)
             this.ruleForm.judul = this.selectedJudul
             if (this.ruleForm.judul !== null){
             this.ruleForm.kategori = this.selectedJudul.kategori
             }
             
         if (
             this.ruleForm.judul !== null &&
        this.ruleForm.abstrak !== null &&
        this.ruleForm.infografis !== null &&
        this.ruleForm.link !== null &&
        this.ruleForm.kategori.length !==  0
         ) {
             this.ruleForm.judul = this.ruleForm.judul.cname + ' ' + this.keteranganTambahanJudul
             console.log('ruleForm.judul', this.ruleForm.judul.cname)
          this.$inertia.post('/submitform', this.ruleForm, {

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
                            this.$toast.add({severity:'success', summary: 'Yeay, Berhasil', detail:'Pesan Berhasil Dikirim', life: 3000});
                            this.loading = false,
                            this.sending = false,
                            this.disabled =null 
                        },
                        onError: (errors) => {
                            // Handle validation errors
                            console.log('onError', errors)
                            this.loading = false,
                            this.sending = false,
                            this.disabled = null 
                        },
                        onFinish: () =>{
                             this.loading = false,
                            this.sending = false,
                            this.disabled = null 
                        } 
                    })   
                   
                    //   this.loading = false,
                    //         this.sending = false,
                    //         this.disabled = '' 
                  
         }
         else{
           
          if (this.ruleForm.judul == null) {
                        this.classForm.judul ='p-invalid'
                        console.log(this.ruleForm)
                      }
          if (this.ruleForm.abstrak == null) {
                        this.classForm.abstrak ='p-invalid'
                        console.log(this.ruleForm)
                      }
                      if (this.ruleForm.infografis == null) {
                        this.classForm.infografis ='p-invalid'
                        console.log(this.ruleForm)
                      }
                      if (this.ruleForm.link == null) {
                        this.classForm.link ='p-invalid'
                        console.log(this.ruleForm)
                      }
                      if (this.ruleForm.kategori.length == 0) {
                        this.classForm.kategori ='p-invalid'
                        console.log(this.ruleForm.kategori.length)
                      }
                      
                      this.$toast.add({severity:'error', summary: 'Ups, Ada Error', detail:'Silakan perbaiki error terlebih dahulu', life: 3000})
  
         }
       
        
      },
    //   async submitForm(formName) {
          
    //       console.log(this.loading, 'loading true')
    //     await this.$refs[formName].validate((valid) => {
    //       if (valid) {
    //         this.$inertia.post('/submitform', this.ruleForm, {
                    
    //                     onStart: () => {
    //                         this.sending = true,     this.loading = true},

    //                     onProgress: (progressEvent) => {
    //                         //DATA TERSEBUT AKAN DI ASSIGN KE VARIABLE progressBar
    //                         this.progressBar = parseInt(Math.round((progressEvent.loaded * 100) /
    //                             progressEvent.total))
    //                         console.log(progressEvent.loaded)
    //                         console.log('Upload Progress: ', this.progressBar)
    //                     },

    //                     onSuccess: (response) => {
    //                         // Handle success event
    //                         console.log('onSuccess', response)
    //                     },
    //                     onError: (errors) => {
    //                         // Handle validation errors
    //                         console.log('onError', errors)
    //                     },
    //                     onFinish: () =>{
    //                          this.sending = false,
    //                         this.loading = false
    //                     }
    //                 })    
    //       } else {
    //         console.log('error submit!!');
    //         return false;
    //       }
    //       console.log(this.loading, 'loading false')
    //     });
        
    //   },
       
      resetForm(formName) {
        this.$refs[formName].resetFields();
      },
      resetForm2() {
        this.ruleForm.judul = null
        this.ruleForm.abstrak = null
        this.ruleForm.infografis = null
        this.ruleForm.link = null
        this.ruleForm.kategori = []

        this.classForm.judul = null
        this.classForm.abstrak = null
        this.classForm.infografis = null
        this.classForm.link = null
        this.classForm.kategori = null
        this.keteranganTambahanJudul = null
      }
    }
  }
</script>

<style>

</style>
