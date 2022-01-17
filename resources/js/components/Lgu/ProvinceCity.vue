<template>
        <div class="row w-100 d-flex">
            <div class="col">
                <div class="row ">
                    <div class="col-5">
                        <img src="/img/add-city_municipality.png" class="add mr-2" alt="">
                        <span class="font-weight-bold text-secondary">Add Cities / Municipality</span>
                    </div>
                    <div class="col-2">
                        <span class="font-weight-bold text-secondary">Status</span>
                    </div>
                </div>
            </div>
            <div class="row w-100 pt-3">
                <div class="col-5">
                    <form @submit.prevent="submitM()">
                        <div class=" w-100 d-flex align-items-center">
                                <div class="col">
                                    <input  type="text"  v-model="nameM" class="form-control-lg w-100 border bg-transparent font-weight-bold"  name="name" placeholder="Name" autofocus />
                                </div>
                                <div class="col">
                                    <input  type="text"  v-model="postal" class="form-control-lg w-100 border bg-transparent font-weight-bold"  name="postal" placeholder="Zip Code"/>
                                </div>
                                <div class="col">
                                    <input type="submit" value="Add" class="btn font-weight-bold btn-outline-primary pl-5 pr-5">
                                </div>
                        </div>
                    </form>
                </div>
                   <div class="col-2 ">
                          <div class="w-100 d-flex align-items-center">
                              <select  v-model="stat" @change="status" class="form-control-lg w-100 border bg-transparent font-weight-bold">
                                  <option value="Active"  class="font-weight-bold text-secondary">Active</option>
                                  <option value="Inactive" class="font-weight-bold text-secondary">Inactive</option>
                              </select>
                          </div>
                    </div>
                  <div class="col-5 d-flex align-items-end p-1 justify-content-center">
                            <form @keypress="search()" @submit.prevent="status()">
                    <input type="text" v-model="query" placeholder="Search" class="border-bottom border-secondary border-top-0 border-right-0 border-left-0 font-weight-bold text-secondary ">
                </form>  
                    </div>
                    
            </div>
            
      
        <div class="w-100 h-100  d-flex">
            <div class="col m-2">
                <div class="row text-secondary font-weight-bold p-3  rounded mb-2">
                   <div class="col">Name</div>
                   <div class="col">Zip Code</div>
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
            query:'',
            stat:'Active'
        }   
    },
    methods:{
        status(){
           if(this.stat == "Active"){
               this.Inactivemunicipality = {}
               this.getMunicipality()
           }else if(this.stat == "Inactive"){
               this.municipality = {}
               this.getInactiveMunicipality()
           }
        },
         search(){
                axios.post('/municipalitySearch',{
                search : this.query,
                status: this.stat
            })
            .then(
                data => {
                if(this.stat == "Active"){
                    this.Inactivemunicipality = {}
                    this.municipality = data.data
                }else if(this.stat == "Inactive"){
                    this.municipality = {}
                    this.Inactivemunicipality = data.data
                }
                }
            )
            .catch(error =>console.log(error))
        },
        submitM(){
            axios.post('/city',{
                name: this.nameM,
                postal: this.postal
            })
            .then(data => console.log(data))
            .catch(error => console.log(error))

              

            this.nameM = ""
            this.postal = ""

             this.Inactivemunicipality = {}
               this.getMunicipality()
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

            if(this.stat == "Active"){
               this.Inactivemunicipality = {}
               this.getMunicipality()
           }else if(this.stat == "Inactive"){
               this.municipality = {}
               this.getInactiveMunicipality()
           }
            
        }
    },
    mounted(){
        this.getMunicipality();
        
    }
}
</script>

<style scoped>
    .add{
        width: 1.5rem;
    }
   input{
       background: transparent;
   }
   input:focus{
       outline: none;
   }
</style>
