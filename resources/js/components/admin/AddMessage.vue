<template>
    <div class="row w-100 h-100 ">
        <div class="col-3">
            <button @click="show = true">Send Message</button>
        </div>
        <div v-if="show" class="w-50 h-75 border border-secondary Modal">
             <div class="w-100 text-right mt-2 pr-3">
                <img src="/img/close.svg" alt="" class="close-modal" @click="show = !show">
            </div>
             <div class="w-100 pl-5 ">
                <form @submit.prevent="send()">
                    <div>
                        <label for="subject" class="font-weight-bold text-secondary">To:</label>
                    </div>
                    <div class="w-100">
                        <input type="text" name="" id="" v-model ="subject" class="border-bottom border-top-0 border-right-0 border-left-0 w-75">
                    </div>
                    <div class="mt-3">
                        <label for="body" class="font-weight-bold text-secondary">Body:</label>
                    </div>
                    <div class="w-100">
                        <textarea name="body" rows="10"  class="w-75 border-0" placeholder="Type here ...." v-model="body"></textarea>
                    </div>
                    <div class="w-100">
                        <button type="submit" class="submit "> submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            show: false
        }
    },

}
</script>

<style scoped>

.Modal{
    position: absolute;
    top: 50%;
    left: 50%;
    transform:translate(-50%, -50%);
    
}
img{
    width: 2rem;
}
textarea{
    background: transparent;
    outline: none;
}
input{
    background: transparent;
    outline: none;
}
.submit{
    position: absolute;
    bottom: 2%;
    right: 4%;
}
</style>