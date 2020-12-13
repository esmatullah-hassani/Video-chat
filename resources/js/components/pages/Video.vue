<template>
  <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
    <div class="bg-blue-800 p-2 shadow text-xl text-white">
        <h3 class="font-bold pl-2">Video Upload</h3>
    </div>
      <!-- form  -->
    <div class="max-w-2xl bg-white py-10 px-5 m-auto w-full mt-10">

      <div class="text-3xl mb-6 text-center ">
          File Upload
      </div>
      <div class="grid grid-cols-2 gap-4 max-w-xl m-auto">
        <div class="col-span-2 lg:col-span-1">
          <input type="text" class="border-solid border-gray-400 border-2 p-3 md:text-xl w-full" placeholder="Name"/>
        </div>

        <div class="col-span-2 lg:col-span-1">
          <input type="text" class="border-solid border-gray-400 border-2 p-3 md:text-xl w-full" placeholder="Email Address"/>
        </div>

        <div class="col-span-2">
          <textarea cols="30" rows="8" class="border-solid border-gray-400 border-2 p-3 md:text-xl w-full" placeholder="Message"></textarea>
        </div>
        <div class="col-span-2">
          <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
              <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
              </svg>
              <span class="mt-2 text-base leading-normal">Select a file</span>
              <input type='file' class="hidden" />
          </label>
        </div>
          
        <div class="col-span-2 text-right">
          <button class="py-3 px-6 bg-green-500 text-white font-bold w-full sm:w-32">
            Submit
          </button>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
export default {
    name:'Video',
}
</script>

<style>

</style>