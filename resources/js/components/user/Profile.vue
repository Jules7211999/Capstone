<template>
    <div class="w-100 h-100">
        <div class="row justify-content-center">
            <div class="col-6 text-center mt-5">
                <a href="/profile/"><img :src="'/img/'+userData.profile_image" alt="" class="w-100"></a>
                <div class="w-50">
                     <input type="file" id="profile_image" name="profile_image" class="d.none"> 
                    <label for="profile_image"><img src="/img/Edit.svg" class="w-25"></label>
                </div>
            </div>
        </div>
         <div class="row ml-2">
            <div class="col-2 text-left mt-5 ">
                <img src="/img/Name.svg" alt="" class="w-75">
            </div>
            <div class="col mt-5 font-weight-bold">
                {{userData.name}}
            </div>
        </div>
        <div class="row ml-2">
            <div class="col-2 text-left mt-5 ">
                <img src="/img/Birthday.svg" alt="" class="w-75">
            </div>
            <div class="col mt-5 font-weight-bold">
                <div v-if="userData.birthdate == null">N/A</div>
                <div v-else> {{userData.birthdate}}</div>
                
            </div>
        </div>
        <div class="row ml-2">
            <div class="col-2 text-left mt-5 ">
                <img src="/img/Phone_number.svg" alt="" class="w-75">
            </div>
            <div class="col mt-5 font-weight-bold">
                 <div v-if="userData.phone_number == null">N/A</div>
                <div v-else> {{userData.phone_number}}</div>
            </div>
        </div>
        <div class="row ml-2">
            <div class="col-2 text-left mt-5 ">
                <img src="/img/Address.svg" alt="" class="w-75">
            </div>
            <div class="col mt-5 font-weight-bold">
                 <div v-if="userData.address == null">N/A</div>
                <div v-else> {{userData.address}}</div>
            </div>
        </div>
         <div class="row ml-2">
            <div class="col-2 text-left mt-5 ">
                <img src="/img/Gender.svg" alt="" class="w-75">
            </div>
            <div class="col mt-5 font-weight-bold">
                 <div v-if="userData.gender == null">N/A</div>
                <div v-else> {{userData.gender}}</div>
            </div>
        </div>
        <div>
            <div class="row justify-content-center mt-5">
                <div class="col-8">
                    <a :href="'/profile/'+userData.id+'/edit'"><button class="w-100 rounded">Edit Profile</button></a>
                      
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
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

    input[type="file"]{
    width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
    }
  
</style>