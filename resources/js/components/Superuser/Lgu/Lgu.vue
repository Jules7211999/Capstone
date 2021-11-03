<template>
    <div class="w-100 h-100">
        <div class="w-100 row pl-5 pt-5">
               <img @click="municipalityshow = !municipalityshow" src="/img/add.png" class="add mr-2" alt=""><span class="font-weight-bold text-secondary">Add City / Municipality</span>
        </div>
        <form @submit.prevent="submitM()">
            <div v-if="municipalityshow" class="row w-100 pl-4 pt-2 d-flex align-items-center">
                <div class="col">
                    <input  type="text"  v-model="nameM" class="form-control-lg w-100 border bg-transparent"  name="name" placeholder="Name" autofocus />
                </div>
                <div class="col">
                    <input  type="text"  v-model="postal" class="form-control-lg w-100 border bg-transparent"  name="postal" placeholder="Postal Code"/>
                </div>
                <div class="col">
                    <input type="submit" value="Add" class="btn btn-primary pl-5 pr-5">
                </div>
            </div>
        </form>
         <div class="w-100 row pl-5 pt-2">
                <img @click="barangayshow = !barangayshow" src="/img/add.png" class="add mr-2" alt=""><span class="font-weight-bold text-secondary">Add Barangay</span>
        </div>
        <form @submit.prevent="submitB">
            <div  v-if="barangayshow" class="row w-100 pl-4 pt-2 d-flex align-items-center">
                <div class="col">
                    <input  type="text"  class="form-control-lg w-100 border bg-transparent"  v-model="nameB" name="name" placeholder="Name" autofocus />
                </div>
                <div class="col">
                    <input type="submit" value="Add" class="btn btn-primary pl-5 pr-5">
                </div>
            </div>
        </form>
        <div class="w-100 justify-content-around d-flex mt-3 mb-3">
            <div class="col-5 ml-2 text-dark font-weight-bold">
                Municipality / City
            </div>
            <div class="col-5 mr-2 text-dark font-weight-bold">
                Barangay
            </div>
        </div>
        <div class="w-100 h-100 justify-content-around d-flex">
            <div class="col-5 ml-2">
                <div v-for="d in municipality" class="row text-primary font-weight-bold p-3 border shadow-sm rounded mb-2">
                   <div class="col">{{d.name}}</div>
                   <div class="col">{{d.postal_code}}</div>
                   <div class="col">{{d.status}}</div>
                   <div class="col"><button @click="updateMunicipality(d.id,'Inactive')" class="btn font-weight-bold btn-outline-danger">disable</button></div>
                </div>
                 <div v-for="x in Inactivemunicipality" class="row text-danger font-weight-bold p-3 border shadow-sm rounded mb-2">
                   <div class="col">{{x.name}}</div>
                   <div class="col">{{x.postal_code}}</div>
                   <div class="col">{{x.status}}</div>
                   <div class="col"><button @click="updateMunicipality(x.id,'Active')" class="btn font-weight-bold btn-outline-primary">enable</button></div>
                </div>
            </div>
            <div class="col-5 mr-2">
                <div v-for="d in barangay" class="row text-primary font-weight-bold p-3 border mb-2 rounded shadow-sm ">
                    <div class="col">{{d.name}} </div>
                    <div class="col">{{d.status}}</div>
                    <div class="col"><button @click="updateBarangay(d.id,'Inactive')" class="btn btn-outline-danger font-weight-bold">disable</button></div>
                </div>
                 <div v-for="x in Inactivebarangay" class="row text-danger font-weight-bold p-3 border mb-2 rounded shadow-sm ">
                    <div class="col">{{x.name}} </div>
                    <div class="col">{{x.status}}</div>
                    <div class="col"><button @click="updateBarangay(x.id,'Active')" class="btn btn-outline-primary font-weight-bold">enable</button></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            barangayshow: false,
            municipalityshow: false,
            Inactivemunicipality:{},
            Inactivebarangay:{},
            nameM:"",
            postal:"",
            nameB: "",
            barangay:{},
            municipality:{}
        }   
    },
    methods:{
        submitM(){
            axios.post('/municipality',{
                name: this.nameM,
                postal: this.postal
            })
            .then(data => console.log(data))
            .catch(error => console.log(error))
            location.reload();
        },
        submitB(){
            axios.post('/barangay',{
                name : this.nameB
            })
            .then(data => console.log(data))
            .catch(error => console.log(error))
            location.reload();
        },
        getBarangay(){
            axios.get('/getBarangay')
            .then(data => this.barangay = data.data)
            .catch(error => console.log(error))
        },
        getMunicipality(){
            axios.get('/getMunicipality')
            .then(data => this.municipality = data.data)
            .catch(error => console.log(error))
        },
          getIncativeBarangay(){
            axios.get('/getInactiveBarangay')
            .then(data => this.Inactivebarangay = data.data)
            .catch(error => console.log(error))
        },
        getInactiveMunicipality(){
            axios.get('/getInactiveMunicipality')
            .then(data => this.Inactivemunicipality = data.data)
            .catch(error => console.log(error))
        },
        updateBarangay(id,status){
           axios.put('/barangay/'+id,{
               status:status
           })
           location.reload();
        },
        updateMunicipality(id,status){
            axios.put('municipality/'+id,{
                status:status
            })
            location.reload();
            
        }
    },
    mounted(){
        this.getBarangay();
        this.getMunicipality();
        this.getInactiveMunicipality();
        this.getIncativeBarangay();
    }
}
</script>

<style scoped>
    .add{
        width: 1.5rem;
    }
</style>
