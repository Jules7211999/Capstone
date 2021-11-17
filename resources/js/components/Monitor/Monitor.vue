<template>
 <div class="text-center">
        <div class="mb-5 ">
            <h2 class="font-weight-bold text-secondary">City / Municipality</h2>
        </div>
        <div class="row d-flex justify-content-center">
        <div v-for="b in municipality" class="col-3 p-3 mb-2 mr-3 rounded shadow-sm border text-center ">
                <a :href="'/monitor/'+b.id" class="font-weight-bold text-secondary">
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
    data(){
        return{
            municipality: {}
        }
    },
    methods:{
        getMunicipality(){
            axios.get('/getMunicipality')
            .then(data => this.municipality = data.data)
            .catch(error => console.log(error))
        },
    },
    mounted(){
        this.getMunicipality();
    }
}
</script>

<style scoped>
   .col-3:hover{
       background-color: #3AADF6;
       transition: 0.2s;
       
   }
</style>