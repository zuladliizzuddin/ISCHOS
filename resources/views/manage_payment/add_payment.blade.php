<x-app-layout>
    <x-slot name="header">
        <h2 class="uppercase font-bold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
            {{ __('FINANCIAL INFORMATION') }}
        </h2>
    </x-slot>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('payment.addPaymentStore') }}" enctype="multipart/form-data">
        @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    <section class="justify-center">
                        <div class="container mx-auto">
                            <div class="flex flex-wrap px-6">
                                <div class="w-full md:px-4 lg:px-6 py-5">

                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                        <label
                                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Class
                                            Name</label>
                                        {!! Form::select('class', $clasList, $class, ['class' => 'py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent', 'required', 'placeholder' => __('Please select'), 'id' => 'class', 'name' => 'class']) !!}
                                    </div>

                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                        <label
                                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Title</label>
                                        <input name="payment_title"
                                            class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                            type="text" placeholder="Insert title " />
                                    </div>

                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                        <label
                                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Description</label>
                                        <textarea name="description"
                                            class="resize-none py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                            type="text" placeholder="Insert Description"></textarea>
                                    </div>

                                    <div class="grid grid-cols-1 mt-5 mx-7">
                                        <label
                                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Amount</label>
                                        <textarea name="amount"
                                            class="resize-none py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                            type="text" placeholder="Insert Amount Example(RM10.00): 10 "></textarea>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class='flex items-center justify-center pt-10 pb-8 '>
                            <button type="submit"
                                class=' md:w-5/12 w-11/12 bg-indigo-900 border-indigo-300 rounded-full font-medium text-white px-4 py-2'>PUBLISH</button>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
