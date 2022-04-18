<template>
    <div class="container mx-auto">
        <div class="p-8 rounded-lg max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h1 class="font-lora text-4xl md:text-5xl text-gray-800 font-bold">Contact</h1>
            </div>
            <form>
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group mb-6">
                        <input
                            type="text"
                            class="form-control font-monse block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-clip-padding border border-gray-300 rounded transition duration-500 m-0 focus:text-gray-800 focus:border-yellow-300 focus:outline-none"
                            id="exampleInput123"
                            aria-describedby=""
                            placeholder="Name"
                        />
                    </div>
                    <div class="form-group mb-6">
                        <input
                            type="email"
                            class="form-control font-monse block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-clip-padding border border-gray-300 rounded transition duration-500 m-0 focus:text-gray-800 focus:border-yellow-400 focus:outline-none"
                            id="exampleInput124"
                            aria-describedby=""
                            placeholder="E-mail"
                        />
                    </div>
                </div>
                <div class="form-group mb-6">
                    <input
                        type="text"
                        class="form-control font-monse block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-clip-padding border border-gray-300 rounded transition duration-500 m-0 focus:text-gray-800 focus:border-yellow-400 focus:outline-none"
                        id="exampleInput125"
                        placeholder="Subject"
                    />
                </div>
                <div class="form-group mb-6">
          <textarea
              class="form-control font-monse block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-clip-padding border border-gray-300 rounded transition duration-500 m-0 focus:text-gray-800 focus:border-yellow-400 focus:outline-none"
              name=""
              id=""
              placeholder="Message"
          ></textarea>
                </div>

                <button
                    type="submit"
                    class="w-full px-6 py-2.5 font-bold bg-yellow-400 uppercase rounded shadow-md hover:bg-yellow-300 hover:shadow-lg focus:border-yellow-300 focus:shadow-lg active:shadow-lg transition duration-500"
                >
                    Send
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({

});
</script>

<style></style>
