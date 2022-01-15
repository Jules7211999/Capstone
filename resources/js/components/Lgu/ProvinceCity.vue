<template>
        <div class="row w-100 d-flex">
            <div class="col">
                <div class="row pl-3">
                    <img src="/img/add-city_municipality.png" class="add mr-2" alt="">
                    <span class="font-weight-bold text-secondary">Add Cities / Municipality</span>
                </div>
            </div>
            <div class="row w-100">
                <div class="col">
                    <form @submit.prevent="submitM()">
                        <div class="row w-100 mt-3 ml-1 d-flex align-items-center">
                                <div class="col-7">
                                    <input  type="text"  v-model="nameM" class="form-control-lg w-100 border bg-transparent font-weight-bold"  name="name" placeholder="Name" autofocus />
                                </div>
                                <div class="col-4">
                                    <input  type="text"  v-model="postal" class="form-control-lg w-100 border bg-transparent font-weight-bold"  name="postal" placeholder="Postal Code"/>
                                </div>
                                <div class="col-1">
                                    <input type="submit" value="Add" class="btn font-weight-bold btn-outline-primary pl-5 pr-5">
                                </div>
                        </div>
                    </form>
                </div>
                  <div class="col d-flex align-items-end p-1 justify-content-center">
                            <form @keypress="search()" @submit.prevent="searchsubmit()">
                                <input type="text" v-model="query" placeholder="Search" class="border-bottom border-secondary border-top-0 border-right-0 border-left-0 font-weight-bold text-secondary w-100">
                            </form>
                    </div>
            </div>
            
      
        <div class="w-100 h-100  d-flex">
            <div class="col m-2">
                <div class="row text-secondary font-weight-bold p-3  rounded mb-2">
                   <div class="col">Name</div>
                   <div class="col">Zipcode</div>
                   <div class="col">Status</div>
                   <div class="col">Action</div>
                </div>
                <div v-for="d in municipality" class="row text-primary font-weight-bold p-3 border shadow-sm rounded mb-2">
                   <div class="col">{{d.name}}</div>
                   <div class="col">{{d.zipcode}}</div>
                   <div class="col">{{d.status}}</div>
                   <div class="col"><button @click="updateMunicipality(d.id,'Inactive')" class="btn font-weight-bold btn-outline-danger">disable</button></div>
                </div>
                 <div v-for="x in Inactivemunicipality" class="row text-danger font-weight-bold p-3 border shadow-sm rounded mb-2">
                   <div class="col">{{x.name}}</div>
                   <div class="col">{{x.zipcode}}</div>
                   <div class="col">{{x.status}}</div>
                   <div class="col"><button @click="updateMunicipality(x.id,'Active')" class="btn font-weight-bold btn-outline-primary">enable</button></div>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            Inactivemunicipality:{},
            nameM:"",
            postal:"",
            municipality:{},
        }   
    },
    methods:{
        submitM(){
            axios.post('/city',{
                name: this.nameM,
                postal: this.postal
            })
            .then(data => console.log(data))
            .catch(error => console.log(error))
            this.getMunicipality();
            this.nameM = ""
            this.postal = ""
        },
        getMunicipality(){
            axios.get('/getMunicipality')
            .then(data => this.municipality = data.data)
            .catch(error => console.log(error))
        },
       
        getInactiveMunicipality(){
            axios.get('/getInactiveMunicipality')
            .then(data => this.Inactivemunicipality = data.data)
            .catch(error => console.log(error))
        },
        updateMunicipality(id,status){
            axios.post('cityUpdate',{
                id: id,
                status:status
            })
            location.reload();
        }
    },
    mounted(){
        this.getMunicipality();
        this.getInactiveMunicipality();
    }
}
</script>

<style scoped>
    .add{
        width: 1.5rem;
    }
   
</style>
