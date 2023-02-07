<template>
    <div class="cont min-h-screen relative grid place-content-center">
    <div class="h-full w-full absolute inset-0 bg-black bg-opacity-50" style="z-index: 0;"></div>
    <div
      class="max-w-lg mx-auto shadow-lg bg-white rounded-md px-6 py-4 overflow-hidden "
      style="z-index: 1000;"
    >
      <h2 class="text-center text-2xl font-semibold text-gray-700 mb-2">
        Welcome to Monsalonline
      </h2>
      <p class="text-sm text-gray-500 text-center">
        Enter your ref here to login
      </p>

      <form action="" method="post">
        <div class="pt-4">
          <label for="email" class="text-sm text-gray-600 block"
            >Ref</label
          >
          <input
            type="text"
            name="firstName"
            placeholder="Enter Your ref"
            id="firstName"
            class="block w-full mt-1 text-sm text-gray-600 border border-gray-500 rounded-md focus:border-primary focus:ring-0"
          />
        </div>
        
        <div class="pt-4">
          <button
            type="input"
            class="block w-full text-center bg-primary py-2 text-white hover:border hover:border-primary transition rounded"
          >
            Login
          </button>
        </div>
      </form>

      <p class="mt-4 text-sm text-gray-500 text-center">
        You don't have an account ?
        <router-link to="/" >Register</router-link>
      </p>
    </div>
  </div>
</template>
<script>
/* eslint-disable */
export default {

    name:"Login-Component"
}
</script>
<style>
    
</style>