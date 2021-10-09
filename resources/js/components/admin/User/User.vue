<template>
<div>
    <div class="w-100 pl-3">
      <a href="/user/create"><div><img src="/img/add-user.png" alt="" class="adduser"><label class="font-weight-bold text-secondary">Add User</label></div></a>
    </div>
    <div class="d-flex flex-wrap w-100 h-100">
        <div v-for="u in user.data" class="m-2 d-flex flex-wrap">
            <a :href="'/user/'+u.id" class="text-secondary">
                <div class="m-2 p-2 shadow-sm border-light user-container">
                    <div class ="text-center mt-3">
                            <img :src="'/img/'+ u.profile_image" alt="" class="w-50">
                        <div class="font-weight-bold mt-5 pt-3">
                            <span>{{u.name}}</span>
                        </div>
                    </div>    
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
            user:{},
        }
    },
    mounted(){
        axios.get('/getUser').then(data => this.user = data);
       
    }
}
</script>

<style scoped>
.user-container{
    width: 250px;
    height: 300px;
    border-radius: 1.5rem;
}
span{
    font-size: 1.5rem;
    word-wrap: break-word;
}
.modal{
    top: 50%;
    right: 50%;
    background-color: aqua;
    z-index: 12;
}
.adduser{
    width: 2rem;
}
.adduser:hover{
    width: 3rem;
    transition: 0.5s ease-out;
}
</style>