<div class="p-6 sm:px-20 bg-white border-b border-gray-200">

    <div class="mt-6 text-gray-500">

        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="grid grid-cols-1 gap-6">
                <form method="POST" action="/url" class="shortlen-form">
                    @csrf()
                    <div class="col-span-3 sm:col-span-2">
                        <label for="company-website" class="block text-sm font-medium text-gray-700">
                            Enter the Url you want to Shorten
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                http://
                            </span>
                            <input type="text" name="destination" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="www.example.com">
                        </div>
                    </div>
                    <div>
                        <span class="hidden text-red-500 invalid-url-msg error">
                                Invalid Url !
                        </span>
                        <span class="hidden text-red-500 empty-url-msg error">
                                Please enter your Url !
                        </span>
                    </div>
                </form>
                <div class="text-right">
                    <button type="submit" onclick="submitDestination()"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Shorten Url
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            SLUG
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            URL
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            CREATED AT
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($urls as $url)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="http://{{$url->destination}}">
                                    http://url-shortener.test/{{$url->slug}}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="http://{{$url->destination}}">
                                    {{$url->destination}}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$url->created_at}}
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>