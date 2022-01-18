<template>
    <div class="w-100 h-100">
        <div class="row w-100 d-flex ">
             <div class="col">
                <div class="row ">
                    <div class="col-5">
                        <img  src="/img/barangay.png" class="add mr-2" alt="">
                        <span class="font-weight-bold text-secondary">Add Barangay</span>
                    </div>
                    <div class="col-2">
                         <span class="font-weight-bold text-secondary">Status</span>
                    </div>
                    <div class="col-2">
                        <span class="font-weight-bold text-secondary">Sort by</span>
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
                    <div class="col-2">
                         <div class="w-100 d-flex align-items-center">
                              <select  v-model="sort" @change="sortby" class="form-control-lg w-100 border bg-transparent font-weight-bold">
                                  <option value="City"  class="font-weight-bold text-secondary">City / Municipality</option>
                                  <option value="Name" class="font-weight-bold text-secondary">Name</option>
                                 
                              </select>
                          </div>
                    </div>
                   <div class="col-3 d-flex align-items-end p-1 justify-content-center">
                            <form @keypress="search()" @submit.prevent="status()">
                    <input type="text" v-model="query" placeholder="Search" class="border-bottom border-secondary border-top-0 border-right-0 border-left-0 font-weight-bold text-secondary ">
                </form>  
                    </div>
                </div>
            
            
        
        <div class="w-100 h-100 justify-content-around d-flex">
          
            <div class="col m-2">
                <div  class="row text-secondary font-weight-bold p-3  rounded mb-2">
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
            Inactivebarangay:{},
            postal:"",
            nameB: "",
            barangay:{},
            municipality:{},
            city:"",
            stat:"Active",
            query:"",
            sort:"Name"
        }   
    },
    methods:{
        sortby(){
              if(this.stat == "Active"){
               this.Inactivebarangay = {}
                if(this.sort == "Name"){
                   this.getBarangay()
                }else if(this.sort == "City"){
                    this.getBarangayByCityActive()
                    
                }
           }else if(this.stat == "Inactive"){
               this.barangay = {}
                if(this.sort == "Name"){
                    this.getInactiveBarangay()
                    
                }else if(this.sort == "City"){
                    this.getBarangayByCityInactive()
                   
                }
           }
        },
        getBarangayByCityActive(){
            axios.get('/getBarangayActiveByCity')
            .then(data => this.barangay = data.data)
            .catch(error => console.log(error))
        },
       
        getBarangayByCityInactive(){
            axios.get('/getBarangayInactiveByCity')
            .then(data => this.Inactivebarangay= data.data)
            .catch(error => console.log(error))
        },
          status(){
           if(this.stat == "Active"){
               this.Inactivebarangay = {}
               if(this.sort == "Name"){
                   this.getBarangay()
                }else if(this.sort == "City"){
                    this.getBarangayByCityActive()
                }
           }else if(this.stat == "Inactive"){
               this.barangay = {}
                if(this.sort == "Name"){
                    this.getInactiveBarangay()
                }else if(this.sort == "City"){
                    this.getBarangayByCityInactive()
                }
           }
        },
         search(){
                axios.post('/barangaySearch',{
                search : this.query,
                status: this.stat
            })
            .then(
                data => {
                if(this.stat == "Active"){
                    this.Inactivebarangay = {}
                    this.barangay = data.data
                }else if(this.stat == "Inactive"){
                    this.barangay = {}
                    this.Inactivebarangay = data.data
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

            this.status();
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
          getInactiveBarangay(){
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
               this.getInactiveBarangay()
           }
        },
    },
    mounted(){
        this.getBarangay();
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
