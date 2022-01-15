<template>
    <div class="w-100 h-100">
        <div class="row w-100 d-flex ">
            {{municipality}}
             <div class="col">
                <div class="row ">
                    <div class="col-5">
                        <img  src="/img/barangay.png" class="add mr-2" alt="">
                        <span class="font-weight-bold text-secondary">Add Barangay</span>
                    </div>
                    <div class="col-2">
                         <span class="font-weight-bold text-secondary">Status</span>
                    </div>
                </div>
            </div>
        </div>
                <div class="row w-100 pt-3">
                    <div class="col-5">
                        <form @submit.prevent="submitB">
                            <div class="row w-100  d-flex align-items-center">
                                <div class="col">
                                    <input  type="text" class="form-control-lg w-100 border bg-transparent font-weight-bold"  v-model="nameB" name="name" placeholder="Name" autofocus />
                                </div>
                                <div class="col">
                                    <select v-model="city" class="form-control-lg w-100 border bg-transparent font-weight-bold" >
                                        <option  class="font-weight-bold" v-for="d in municipality" :value="d.id">{{d.name}}</option>
                                    </select>
                                </div>
                                
                                <div class="col">
                                    <input type="submit" value="Add" class="btn btn-outline-primary font-weight-bold pl-5 pr-5">
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
                            <form @keypress="search()">
                    <input type="text" v-model="query" placeholder="Search" class="border-bottom border-secondary border-top-0 border-right-0 border-left-0 font-weight-bold text-secondary ">
                </form>  
                    </div>
                </div>
            
            
        
        <div class="w-100 h-100 justify-content-around d-flex">
          
            <div class="col m-2">
                <div  class="row text-secondary font-weight-bold p-3  rounded mb-2">
                    <div class="col">Nameasdf</div>
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
            Inactivebarangay:{},
            postal:"",
            nameB: "",
            barangay:{},
            municipality:{},
            city:"",
            stat:"Active",
            query:""
        }   
    },
    methods:{
          status(){
           if(this.stat == "Active"){
               this.Inactivebarangay = {}
               this.getBarangay()
           }else if(this.stat == "Inactive"){
               this.barangay = {}
               this.getIncativeBarangay()
           }
        },
         search(){
                axios.post('/Search',{
                search : this.query,
                status: this.stat
            })
            .then(
                data => {
                if(this.stat == "Active"){
                    this.Inactivemunicipality = {}
                    this.municipality = data.data
                }else if(this.stat == "Inactive"){
                    this.barangay = {}
                    this.Inactivemunicipality = data.data
                }
                }
            )
            .catch(error =>console.log(error))
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
        updateBarangay(id,status){
           axios.put('/barangay/'+id,{
               status:status
           })
           if(this.stat == "Active"){
               this.Inactivebarangay = {}
               this.getBarangay()
           }else if(this.stat == "Inactive"){
               this.barangay = {}
               this.getIncativeBarangay()
           }
        },
    },
    mounted(){
        console.log("hello")
        this.getBarangay();
        this.getIncativeBarangay();
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
