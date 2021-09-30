<template>
<div class="d-flex  align-items-center w-100 h-100">
    <div class="ml-3 w-100">
        <form @submit.prevent="submit()">
            <div class="row w-100">
                <div class="col-2 text-left pt-5 ">
                    <img src="/img/Name.svg" alt="" class="w-100">
                </div>
                <div class="col mt-5 font-weight-bold">
                    <input type="text" value="hello" v-model="fields.name"  name="Name" class="w-100 pr-2" :placeholder="userData.name">
                </div>
            </div>
            <div class="row w-100">
                <div class="col-2 text-left mt-5 ">
                    <img src="/img/Birthday.svg" alt="" class="w-100">
                </div>
                <div class="col mt-5">
                    <input type="date" v-model="fields.birthdate"  class="w-100" name="Birthdate" :placeholder="userData.birthdate">
                </div>
            </div>
            <div class="row w-100">
                <div class="col-2 text-left mt-5 ">
                    <img src="/img/Phone_number.svg" alt="" class="w-100">
                </div>
                <div class="col mt-5 font-weight-bold">
                    <input type="text" v-model="fields.phone_number" class="w-100"  name="Phone_number" :placeholder="userData.phone_number">
                </div>
            </div>
            <div class="row w-100">
                <div class="col-2 text-left mt-5 ">
                    <img src="/img/Address.svg" alt="" class="w-100">
                </div>
                <div class="col mt-5 font-weight-bold">
                    <input type="text" v-model="fields.address" class="w-100"  name="Address" :placeholder="userData.address">
                </div>
            </div>
            <div class="row w-100">
                <div class="col-2 text-left mt-5 d-flex align-items-center">
                    <img src="/img/Gender.svg" alt="" class="w-100">
                </div>
                <div class="col mt-5 font-weight-bold d-flex">
                    <input type="radio" v-model="fields.gender" name="male" value="male" class="mr-1">
                    <label for="male" class="mr-1">Male</label>
                    <input type="radio"  v-model="fields.gender" name="female" value="female" class="mr-1 ">
                    <label for="female" class="mr-1">Female</label>
                </div>
            </div>
            <div>
                <div class="row w-100 justify-content-center mt-5">
                    <div class="col-8">
                        <button type="submit" w-100 class="rounded">Edit Profile</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return{
            userData: {},
            fields:{},
            error:{},
            tracklocation: ""
         }
    },
    methods:{
        submit(){
          axios.put('/profile/'+this.userData.id,this.fields)
          .then(data => console.log(data.data))
          .catch(error => console.log(error.response.data.message));
       
        
            
        }
    },
    mounted(){
       axios.get('/getUserProfile')
       .then(data => this.userData = data.data)
    }
}
</script>

<style scoped>
    button{ 
    width:100%;
    padding: 0.5rem;
     color: #000;
     border: 1px solid #000;
     text-align: center;
     outline: 0;
    text-decoration: 0;
    background: transparent;
    font-weight: bold;
    }


    input{
        border: none;
        background: transparent;
        border-bottom: 1px solid #000 ;
    }
  

</style>