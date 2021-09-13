<template>
  <nav class="navbar justify-content-between px-5 w-100 ">
        <a  class="navbar-brand"><img src="/img/logo.svg" alt="" srcset="" class="w-50 ml-4"></a>
    <div class="dropdown show mr-5">
        <a class="btn border-0 dropdown-toggle font-weight-bold" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="/img/logo.svg" alt="" class="w-25 rounded-circle"><span class="ml-3">{{name.data}}</span>
        </a>
      <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="#">Profile</a>
        <a class="dropdown-item" href="#">Settings</a>
        <a class="dropdown-item" href="/logout">Logout</a>
      </div>
  </div>
</nav>
</template>

<script>
export default {
  data(){
    return{
      name:""
    }
  },
    mounted(){
        
        axios.get('/authname')
        .then(data => this.name = data);
    }
}
</script>

<style scoped>

</style>