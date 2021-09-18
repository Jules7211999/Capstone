<template>
    <div class="row w-100 h-100">
      <addpost/>
      {{post}}
    </div>
    
</template>


<script>
import addpost from './AddPost.vue';
export default {
components:{addpost},
mounted(){
  axios.get('/getpost')
  .then(data => this.post = data.data)
},
data(){
  return{
    post:{}
  }
}

}
</script>

<style scoped>

</style>