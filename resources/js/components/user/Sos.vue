<template>
    <div class="w-100 vh-100 d-flex align-items-center m-0 p-0">
        {{img}}
        <form @submit.prevent="sendSOS()" class="w-100" >
            <div class="row w-100 m-0 p-0 d-flex justify-content-center">
                <div class="col-12 d-flex justify-content-center">
                    <label for="img" class="d-flex justify-content-center"><img src="/img/file.svg" alt="" class="w-50"></label>
                    <input id="img" type="file" @change="onChange">
                </div>
            </div>
            <div class="row m-0 p-0 w-100">
                <div class="col-12 justify-content-center d-flex">
                     <button type="submit" class="btn-success rounded">Emergency Signal</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data(){
        return {
            img: null
        }
    },
    methods:{
        onChange(event){
            console.log("selected file is:"+ event.target.files[0].name);
            this.img = event.target.files[0];
        },
        success(position){
                let fd = new FormData();
                fd.append('latitude',position.coords.latitude);
                fd.append('longitude',position.coords.longitude);
                fd.append('img',this.img);
                axios.post('/sos',fd)
                .then(data => console.log(data))
                .catch(error => console.log(error.response.data.message))
        },
        error(){
            console.log("error");
        },
        sendSOS(){
           navigator.geolocation.getCurrentPosition(this.success, this.error);
        }
    }
}
</script>
<style scoped>
   input[type="file"]{
    width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
    }
</style>