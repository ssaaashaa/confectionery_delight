<h2>
    Запись на дегустацию
</h2>
<form method="POST" action="{{route("tasting_process")}}">
    @csrf

    <input name="name" type="text"
           class="w-full h-12 border border-gray-800 rounded px-3 @error('name') border-red-500 @enderror"
           placeholder="Имя"
           @auth("web")
               value="{{Auth::user()->name}}"
        @endauth
    />

    @error('name')
    <p class="text-red-500">{{ $message }}</p>
    @enderror

    <input name="telephone" type="text"
           class="w-full h-12 border border-gray-800 rounded px-3 @error('telephone') border-red-500 @enderror"
           placeholder="Телефон"
           @auth("web")
               value="{{Auth::user()->telephone}}"
        @endauth/>

    @error('telephone')
    <p class="text-red-500">{{ $message }}</p>
    @enderror

    <button type="submit"
            class="font-bold py-2 px-4 w-full bg-purple-400 text-lg text-white shadow-md rounded-lg button">
        Записатся на дегустацию
    </button>
</form>

