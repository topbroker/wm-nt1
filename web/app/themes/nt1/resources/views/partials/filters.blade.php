<form action="" method="get">
    <div class="flex flex-col lg:flex-row item-add lg:items-end ">
        <div class="filters-labels flex-1 flex flex-col lg:flex-row mb-6 lg:mb-0 items-center lg:items-end">
            <div class="filters-label-wrap mb-6 lg:mb-0 filters-label-wrap mb-6 lg:mb-0-city">
                <label class="filters-label">
                    <span class="mb-2">Vieta</span>
                    <select name="city" class="filters-input-select">
                        <option value=""></option>
                        @foreach(get_query_var('cities') as $city)
                            <option value="{{ $city->id }}" @if($city->id == filter_var($_GET['city'], FILTER_SANITIZE_NUMBER_INT)) selected @endif>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="filters-label-wrap mb-6 lg:mb-0">
                <div class="mb-5px">Kaina nuo-iki</div>
                <div class="flex -mx-4">
                    <div class="px-4">
                        <label class="filters-label">
                            <input type="number" min="100" step="100" name="price_min" class="filters-input-number" value="{{ filter_var($_GET['price_min'], FILTER_SANITIZE_NUMBER_INT) }}">
                        </label>
                    </div>
                    <div class="px-4">
                        <label class="filters-label">
                            <input type="number" min="100" step="100" name="price_max" class="filters-input-number" value="{{ filter_var($_GET['price_max'], FILTER_SANITIZE_NUMBER_INT) }}">
                        </label>
                    </div>
                </div>
            </div>
            <div class="filters-label-wrap mb-6 lg:mb-0">
                <div class="mb-5px">Plotas</div>
                <div class="flex -mx-4">
                    <div class="px-4">
                        <label class="filters-label">
                            <input type="number" min="10" step="10" name="area_min" class="filters-input-number" value="{{ filter_var($_GET['area_min'], FILTER_SANITIZE_NUMBER_INT) }}">
                        </label>
                    </div>
                    <div class="px-4">
                        <label class="filters-label">
                            <input type="number" min="10" step="10" name="area_max" class="filters-input-number" value="{{ filter_var($_GET['area_max'], FILTER_SANITIZE_NUMBER_INT) }}">
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-none text-center lg:text-left">
            <span class="lg:hidden inline-flex rounded-md shadow-sm">
              <button @click.prevent="show = !show" type="button" class="whitespace-no-wrap inline-flex items-center justify-center text-12px uppercase px-8 py-2 border-2 border-red-1 leading-6 font-medium text-red-1 rounded-full bg-white focus:outline-none focus:shadow-outline-indigo transition ease-in-out duration-150">
                  <span x-show="!show">Filtrai</span>
                  <span x-show="show">Suskleisti</span>
              </button>
            </span>
            <span class="inline-flex rounded-md shadow-sm">
              <button type="submit" class="whitespace-no-wrap inline-flex items-center justify-center text-12px uppercase px-8 py-2 border-2 border-red-1 leading-6 font-medium rounded-full text-white bg-red-1 hover:bg-red-2 focus:outline-none focus:border-red-2 focus:shadow-outline-indigo active:bg-red-2 transition ease-in-out duration-150">
                  Siųsti
              </button>
            </span>
        </div>
    </div>
</form>