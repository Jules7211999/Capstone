<template>
    <div class="text-center">
        <div class="mb-5 ">
            <h2 class="font-weight-bold text-secondary">{{barangay[0].name}}</h2>
        </div>
        <div class="row d-flex justify-content-center">
        <div v-for="b in barangay[0].barang" class="col-3 p-3 mb-2 mr-3 rounded shadow-sm border text-center ">
                <a :href="'/monitor/show/'+b.id" class="font-weight-bold text-secondary">
                    <div>
                        {{b.name}}
                    </div>
                </a>
        </div>
          </div>
    </div>
</template>


<script>
export default {
    props:['id'],
    data(){
        return{
            barangay: {}
        }
    },
    methods:{
         getBarangay(){
            axios.get('/getMonitorBarangay/'+this.id)
            .then(data => this.barangay = data.data)
            .catch(error => console.log(error))
        },
    },
    mounted(){
        this.getBarangay();
    }
}
</script>

<style scoped>
   .col-3:hover{
       background-color: #3AADF6;
       transition: 0.2s;
       
   }
</style>