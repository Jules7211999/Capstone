<template>
    <div class="w-100 h-100 main-wrapper">
       <div class="row w-100 h-25 m-0 p-0 d-flex justify-content-center">
           <profileimage :profileImg="userData.profile_image" />
       </div>
       <div class="h-50 w-100 pt-5">
            <div class="row ml-5 d-flex mt-3 ">
                <div class="col-5 text-left font-weight-bold">
                    <span>Name</span>
                </div>
            </div>
            <div class="row ml-5 d-flex mt-1 ">
                <div class="col-5 text-left text-secondary font-weight-bold">
                    <span>{{userData.name}}</span>
                </div>
            </div>
            <div class="row ml-5 d-flex mt-3 ">
                <div class="col-5 text-left font-weight-bold">
                    <span>Birthday</span>
                </div>
            </div>
             <div class="row ml-5 d-flex mt-1 ">
                <div class="col-5 text-left text-secondary font-weight-bold">
                    <div v-if="userData.birthdate == null">N/A</div>
                    <div v-else> {{userData.birthdate}}</div>
                </div>
            </div>
            <div class="row ml-5 d-flex mt-3 ">
                <div class="col-5 text-left font-weight-bold">
                    <span>Phone Number</span>
                </div>
            </div>
               <div class="row ml-5 d-flex mt-1 ">
                <div class="col-5 text-left text-secondary font-weight-bold">
                    <div v-if="userData.phone_number == null">N/A</div>
                    <div v-else> {{userData.phone_number}}</div>
                </div>
            </div>
            <div class="row ml-5 d-flex mt-3 ">
                <div class="col-5 text-left font-weight-bold">
                    <span>Address</span>
                </div>
            </div>
             <div class="row ml-5 d-flex mt-1 ">
                <div class="col-5 text-left text-secondary font-weight-bold">
                    <div v-if="userData.address == null">N/A</div>
                    <div v-else> {{userData.address}}</div>
                </div>
            </div>
              <div class="row ml-5 d-flex mt-3 ">
                <div class="col-5 text-left font-weight-bold">
                    <span>Gender</span>
                </div>
            </div>
            <div class="row ml-5 d-flex mt-1 ">
                <div class="col-5 text-left text-secondary font-weight-bold">
                     <div v-if="userData.gender == null">N/A</div>
                    <div v-else> {{userData.gender}}</div>
                </div>
            </div>  
            <div class="w-100 d-flex justify-content-center editProfile">
                <div class="col-8">
                    <a :href="'/profile/'+userData.id+'/edit'"><button class="w-100 rounded">Edit Profile</button></a>
                </div>
            </div>
       </div>
    </div>
</template>

<script>
import profileimage from './ProfileImage.vue'
export default {
    components:{profileimage},
    data(){
        return{
            userData: {}
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
     outline: none;
    text-decoration: none;
    background: transparent;
    font-weight: bold;
    }
.editProfile{
    position: absolute;
    bottom: 2%;
}

</style>