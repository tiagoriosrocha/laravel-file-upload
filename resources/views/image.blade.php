<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Upload de Imagens</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>
        <div class="relative flex items-center min-h-screen justify-center overflow-hidden">
            <form action="/image" method="POST" class="shadow p-12" enctype="multipart/form-data">
                @csrf
                
                <div class="col-span-full">
                    <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Conteúdo</label>
                    <div class="mt-2">
                        <textarea id="content" name="content" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="file" class="block text-sm font-medium leading-6 text-gray-900"></label>
                    <div class="mt-2">
                        <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                    </div>
                </div>
                
                <button type="submit" class="px-4 py-2 text-sm text-white bg-indigo-600 rounded">Submit</button>
            </form>
        </div>

    </body>

</html>