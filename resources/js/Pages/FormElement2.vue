<template>
    <div>
        <div class="p-fluid text-gray-600">
            <Toast />
            <Toast position="top-left" group="tl" />
            <Toast position="bottom-left" group="bl" />
            <Toast position="bottom-right" group="br" />
            <div class="p-field p-grid">
                <label for="firstname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0 ">Judul</label>
                <div class="p-col-9 p-md-7">
                  <CascadeSelect v-model="selectedCity" :options="countries" optionLabel="cname" optionGroupLabel="name" 
                        :optionGroupChildren="['states', 'cities']" style="minWidth: 14rem" />
                    <MultiSelect :filter="true" v-model="selectedGroupedCities" :options="groupedCities" optionLabel="label"
                        optionGroupLabel="label" optionGroupChildren="items">
                    </MultiSelect>
                    <InputText v-model="ruleForm.judul" type="text" :class="classForm.judul"
                        @input="changeJudulInput()" />
                    <small v-if="classForm.judul == 'p-invalid' " id="username2-help" class="p-error">Silakan masukkan
                        judul</small>

                </div>
                <div class="p-col-3 p-md-3 ">
                    <span class="p-float-label">
                        <InputText id="inputtext" type="text" v-model="value1" />
                        <label for="inputtext">Keterangan Tambahan Judul</label>
                    </span>
                    <small v-if="classForm.judul == 'p-invalid' " id="username2-help" class="p-error">Silakan masukkan
                        judul</small>

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
            <div class="p-field p-grid">
                <label for="lastname" class="p-col-12 p-mb-2 p-md-2 p-mb-md-0">Kategori</label>
                <div class="p-col-12 p-md-10">
                    
                    <MultiSelect v-model="ruleForm.kategori" :filter="true" :options="kategoriOptions" optionLabel="kategori" placeholder="Kategori" display="chip" :class="classForm.kategori" @change="changeKategoriInput()"/>
                    <!-- <InputText v-model="ruleForm.kategori" :class="classForm.kategori" type="text" /> -->
                    <small v-if="classForm.kategori == 'p-invalid' " id="username2-help" class="p-error">Silakan masukkan kategori</small>
                </div>
            </div>   
        </div>  
        <br>
        <br>
 
        <div class="p-d-flex p-jc-center">
            <div class="p-mr-2"><Button label="Reset" @click="resetForm2()" icon="pi pi-spinner" iconPos="left" class="p-button-outlined p-d-block p-mx-auto" /> </div>
            <div><Button @click="submitForm2(ruleForm)" label="Submit" icon="pi pi-send" iconPos="left" class="p-d-block p-mx-auto" /> </div>
        </div>

    </div>

</template>

<script>
  export default {
    data() {
      return {
        selectedCity: null,
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
        selectedGroupedCities: null,
            groupedCities: [{
                label: 'Germany', code: 'DE', 
                items: [
                    {label: 'Berlin', value: 'Berlin'},
                    {label: 'Frankfurt', value: 'Frankfurt'},
                    {label: 'Hamburg', value: 'Hamburg'},
                    {label: 'Munich', value: 'Munich'}
                ]
            },
            {
                label: 'USA', code: 'US', 
                items: [
                    {label: 'Chicago', value: 'Chicago'},
                    {label: 'Los Angeles', value: 'Los Angeles'},
                    {label: 'New York', value: 'New York'},
                    {label: 'San Francisco', value: 'San Francisco'}
                ]
            },
            {
                label: 'Japan', code: 'JP', 
                items: [
                    {label: 'Kyoto', value: 'Kyoto'},
                    {label: 'Osaka', value: 'Osaka'},
                    {label: 'Tokyo', value: 'Tokyo'},
                    {label: 'Yokohama', value: 'Yokohama'}
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
         classForm: {
          judul: '',
          abstrak: '',
          infografis: '',
          link: '',
          kategori: '',
        },
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
         if (
             this.ruleForm.judul !== null &&
        this.ruleForm.abstrak !== null &&
        this.ruleForm.infografis !== null &&
        this.ruleForm.link !== null &&
        this.ruleForm.kategori.length !==  0
         ) {
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
                            this.$toast.add({severity:'success', summary: 'Yeay, Berhasil', detail:'Pesan Berhasil Dikirim', life: 3000});
                        },
                        onError: (errors) => {
                            // Handle validation errors
                            console.log('onError', errors)
                        },
                        onFinish: () => this.sending = false,
                    })   
                   
                     
                  
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
      async submitForm(formName) {

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
      }
    }
  }
</script>

<style>

</style>
