<template>
    <div class="w-100 h-100">
        <div class="row w-100 d-flex justify-content-around">
            <div class="col-5">
                   <div class="row pl-3">
                       <img @click="municipalityshow = !municipalityshow" src="/img/add-city_municipality.png" class="add mr-2" alt="">
                       <span class="font-weight-bold text-secondary">Add Cities / Municipality</span>
                   </div>
            <div class="row">
                <form @submit.prevent="submitM()">
                 <div v-if="municipalityshow" class="row w-100 mt-3 ml-1 d-flex align-items-center">
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
            </div>
             <div class="col-5 ">
                <div class="row pl-3">
                    <img @click="barangayshow = !barangayshow" src="/img/barangay.png" class="add mr-2" alt="">
                    <span class="font-weight-bold text-secondary">Add Barangay</span>
                </div>
                <div class="row">
                <form @submit.prevent="submitB">
                    <div  v-if="barangayshow" class="row w-100 mt-3 ml-1 d-flex align-items-center">
                        <div class="col-5">
                            <input  type="text"  class="form-control-lg w-100 border bg-transparent font-weight-bold"  v-model="nameB" name="name" placeholder="Name" autofocus />
                        </div>
                        <div class="col-5">
                            <select v-model="city"  class="form-control-lg w-100 border bg-transparent font-weight-bold" >
                                <option  class="font-weight-bold" v-for="d in municipality" :value="d.id">{{d.name}}</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <input type="submit" value="Add" class="btn btn-outline-primary font-weight-bold pl-5 pr-5">
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <div class="w-100 justify-content-around d-flex mt-5 mb-3">
            <div class="col-5 ml-2 text-dark font-weight-bold">
                <h4 class="font-weight-bold text-dark">Municipality / City</h4>
            </div>
            <div class="col-5 mr-2 text-dark font-weight-bold">
                <h4 class="font-weight-bold text-dark">Barangay</h4>
            </div>
        </div>
        <div class="w-100 h-100 justify-content-around d-flex">
            <div class="col-5 ml-2">
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
            <div class="col-5 mr-2">
                <div  class="row text-secondary font-weight-bold p-3 mb-2 rounded ">
                    <div class="col">Name</div>
                    <div class="col">Status</div>
                    <div class="col">City</div>
                    <div class="col">Action</div>
                </div>
                <div v-for="d in barangay" class="row text-primary font-weight-bold p-3 border mb-2 rounded shadow-sm ">
                    <div class="col">{{d.name}} </div>
                    <div class="col">{{d.status}}</div>
                    <div class="col">{{d.city.name}}</div>
                    <div class="col"><button @click="updateBarangay(d.id,'Inactive')" class="btn btn-outline-danger font-weight-bold">disable</button></div>
                </div>
                 <div v-for="x in Inactivebarangay" class="row text-danger font-weight-bold p-3 border mb-2 rounded shadow-sm ">
                    <div class="col">{{x.name}} </div>
                    <div class="col">{{x.status}}</div>
                    <div class="col">{{x.city.name}}</div>
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
            municipality:{},
            city:""
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
        submitB(){
            axios.post('/barangay',{
                name : this.nameB,
                city :this.city
            })
            .then(data => console.log(data))
            .catch(error => console.log(error))
            this.getBarangay();
            this.nameB = ""
            this.city = ""
            
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
           this.getIncativeBarangay();
           this.getBarangay();
        },
        updateMunicipality(id,status){
            axios.post('cityUpdate',{
                id: id,
                status:status
            })
            this.getMunicipality();
            this.getInactiveMunicipality();
            
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
