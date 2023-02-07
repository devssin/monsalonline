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
        Register to be able to book your hours
      </p>

      <form action="" method="post">
        <div class="pt-4">
          <label for="email" class="text-sm text-gray-600 block"
            >First Name</label
          >
          <input
            type="text"
            name="firstName"
            placeholder="Enter Your first Name"
            id="firstName"
            class="block w-full mt-1 text-sm text-gray-600 border border-gray-500 rounded-md focus:border-primary focus:ring-0"
          />
        </div>
        <div class="pt-4">
          <label for="email" class="text-sm text-gray-600 block"
            >Last Name</label
          >
          <input
            type="text"
            name="lastName"
            placeholder="Enter Your first Name"
            id="lastName"
            class="block w-full mt-1 text-sm text-gray-600 border border-gray-500 rounded-md focus:border-primary focus:ring-0"
          />
        </div>
        <div class="pt-4">
          <label for="number" class="text-sm text-gray-600 block"
            >Phone Number</label
          >
          <input
            type="text"
            name="tel"
            placeholder="tel"
            id="tel"
            class="block w-full mt-1 text-sm text-gray-600 border border-gray-500 rounded-md focus:border-primary focus:ring-0"
          />
        </div>
        <div class="pt-4">
          <button
            type="input"
            class="block w-full text-center bg-primary py-2 text-white hover:border hover:border-primary transition rounded"
          >
            Register
          </button>
        </div>
      </form>

      <p class="mt-4 text-sm text-gray-500 text-center">
        You don't have an account ?
        <router-link to="/login" >Login</router-link>
      </p>
    </div>
  </div>
</template>
<script>
export default {
  name: 'Register-Component',
}
</script>
<style>
.cont {
  background: url('../assets/img/julien-orliac-gzobGDzh4ww-unsplash.jpg')
    no-repeat center center;
  background-size: cover;
}
</style>
