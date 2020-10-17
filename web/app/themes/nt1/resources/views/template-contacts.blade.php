{{--
  Template Name: Kontaktai
--}}

<?php
$contacts = get_field('contacts', 'options');
?>

@extends('layouts.app')

@section('content')
  <div class="container py-70px">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 lg:gap-150px mb-60px">
          <div class="flex">
              <div class="flex-none pt-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="30" viewBox="0 0 28 30"><g><g><g><g><path fill="#454142" d="M21.81 14.696H5.805a.44.44 0 1 0 0 .88H21.81a.44.44 0 1 0 0-.88z"/></g><g><path fill="#454142" d="M17.96 17.543H9.656a.44.44 0 1 0 0 .879h8.304a.44.44 0 1 0 0-.88z"/></g><g><path fill="#454142" d="M21.81 9.877h-5.881a.44.44 0 1 0 0 .879h5.88a.44.44 0 1 0 0-.88z"/></g><g><path fill="#454142" d="M21.81 7.641h-5.881a.44.44 0 1 0 0 .879h5.88a.44.44 0 1 0 0-.879z"/></g><g><path fill="#454142" d="M24.976 15.197v-2.31l1.46 1.198zm-.878-3.24v3.909l-9.773 7.444a.799.799 0 0 1-1.07 0L3.48 15.866V2.067A1.19 1.19 0 0 1 4.669.88h13.99c.079 0 .158.008.234.023v3.733c0 .799.65 1.449 1.449 1.449h3.733a1.2 1.2 0 0 1 .023.234v5.64zm1.994 17.164H1.583l9.324-6.494c1.964 1.496 2.162 1.767 2.882 1.767.89 0 1.161-.55 2.887-1.77zm-25.213-.58V14.989l9.294 7.079zm1.723-15.654v2.31l-1.46-1.112zM19.772 1.5l3.704 3.705h-3.135a.57.57 0 0 1-.57-.57V1.5zm7.367 22.952a.44.44 0 0 0 .44-.439v-9.454c0-.427-.19-.828-.52-1.1l-2.083-1.71V6.32c0-.553-.215-1.072-.605-1.462L20.12.605C19.73.215 19.21 0 18.658 0H4.67a2.07 2.07 0 0 0-2.067 2.067v9.683L.52 13.46c-.33.27-.52.672-.52 1.1v14.017C0 29.364.642 30 1.423 30h24.732c.785 0 1.424-.639 1.424-1.423v-2.474a.44.44 0 1 0-.88 0v2.37l-9.287-6.41L26.7 14.99v9.024c0 .243.196.44.44.44z"/></g><g><path fill="#454142" d="M8.236 9.152a1.939 1.939 0 0 0 1.806 0c.884.268 1.6.913 1.958 1.767a.51.51 0 0 1-.44.252H6.719a.51.51 0 0 1-.44-.252 3.091 3.091 0 0 1 1.958-1.767zM9.14 6.35a1.074 1.074 0 1 1-1.072 1.072c0-.59.48-1.072 1.072-1.072zm2.422 5.7a1.39 1.39 0 0 0 1.388-1.389V4.657a1.39 1.39 0 0 0-1.388-1.39H6.718a1.39 1.39 0 0 0-1.389 1.39v.512a.44.44 0 0 0 .879 0v-.512a.51.51 0 0 1 .51-.51h4.843a.51.51 0 0 1 .51.51v4.766a3.964 3.964 0 0 0-1.298-.935c.2-.306.318-.672.318-1.065a1.953 1.953 0 0 0-1.952-1.951 1.953 1.953 0 0 0-1.951 1.951c0 .393.117.759.318 1.065-.495.222-.935.54-1.298.935v-2.2a.44.44 0 0 0-.879 0v3.438a1.39 1.39 0 0 0 1.389 1.389z"/></g></g></g></g></svg>
              </div>
              <div class="font-light ml-30px space-y-6">
                  <div class="text-24px font-bold uppercase">{{ \wmnt\Helpers::get_string('Kontaktai') }}</div>
                  <div>
                      <a href="tel:{{ $contacts['phone'] }}">{{ $contacts['phone'] }}</a>
                  </div>
                  <div>
                      <a href="mailto:{{ $contacts['email'] }}">{{ $contacts['email'] }}</a>
                  </div>
              </div>
          </div>
          <div class="flex">
              <div class="flex-none pt-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="30" viewBox="0 0 32 30"><g><g><g><path fill="#454142" d="M27.368 18.947a1.579 1.579 0 1 1-3.157 0 1.579 1.579 0 0 1 3.157 0zm-4.21 0a2.632 2.632 0 1 0 5.263 0 2.632 2.632 0 0 0-5.263 0z"/></g><g><path fill="#454142" d="M25.79 28.947c-2.022 0-3.095-.579-3.158-.779.047-.163.72-.579 2.084-.736.373.463.631.757.679.81a.526.526 0 0 0 .79 0c.047-.053.304-.347.678-.81 1.363.157 2.037.573 2.084.715-.063.221-1.136.8-3.158.8zm-6.843-3.158v-7.894a.526.526 0 0 0-.526-.527h-7.368a.526.526 0 0 0-.527.527v7.894H3.684V7.095l11.053-2.869 11.052 2.869v6.063a5.827 5.827 0 0 0-2.105.4v-1.453a3.158 3.158 0 1 0-6.316 0v2.106h-.526v1.052h4.484A5.767 5.767 0 0 0 20 18.947c0 1.853 1.89 4.769 3.432 6.842zm-1.052 0h-2.632v-7.368h2.632zm-3.684 0h-2.632v-7.368h2.632zM1.053 6.69V4.616l13.684-3.548L28.42 4.616v2.073L14.868 3.174a.556.556 0 0 0-.263 0zm17.368 7.522v-2.106a2.11 2.11 0 0 1 3.595-1.494c.394.397.615.934.616 1.494V14.1l-.158.11zm12.105 4.736c0 2.037-3.12 6.195-4.737 8.137-1.615-1.942-4.736-6.1-4.736-8.137a4.737 4.737 0 0 1 9.473 0zm1.053 0a5.8 5.8 0 0 0-4.737-5.69V7.369l1.974.51a.526.526 0 0 0 .658-.51V4.211c0-.24-.162-.45-.395-.511L14.869.016a.556.556 0 0 0-.264 0L.395 3.7A.526.526 0 0 0 0 4.21v3.158c0 .164.075.318.205.416a.534.534 0 0 0 .453.095l1.974-.51v18.947c0 .29.235.526.526.526h19.568c-.673.295-1.147.726-1.147 1.316 0 1.263 2.184 1.842 4.21 1.842C27.816 30 30 29.421 30 28.158c0-.91-1.11-1.437-2.379-1.68 1.6-2.062 3.958-5.457 3.958-7.53z"/></g><g><path fill="#454142" d="M12.632 21.579h1.052v1.053h-1.052z"/></g><g><path fill="#454142" d="M15.79 21.579h1.052v1.053H15.79z"/></g><g><path fill="#454142" d="M11.053 14.21h-4.21v-2.105a2.105 2.105 0 0 1 4.21 0zm1.052 0v-2.105a3.158 3.158 0 1 0-6.316 0v2.106h-.526v1.052h7.369v-1.052z"/></g></g></g></svg>
              </div>
              <div class="font-light ml-30px space-y-6">
                  <div class="text-24px font-bold uppercase">{{ \wmnt\Helpers::get_string('Adresas') }}</div>
                  @foreach($contacts['address_lines'] as $address_line)
                    <div>{{ $address_line['line'] }}</div>
                  @endforeach
              </div>
          </div>
          <div class="flex">
              <div class="flex-none pt-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="23" height="30" viewBox="0 0 23 30"><g><g><g><path fill="#454142" d="M21.797 26.25h-2.344V3.047H3.75V.703h18.047zm-3.047 3.047H5.39v-4.688H.704V3.75H18.75zM4.687 28.8L1.2 25.313h3.487zM22.5 0H3.047v3.047H0v22.06L4.893 30h14.56v-3.047H22.5z"/></g><g><path fill="#454142" d="M3.164 5.86h9.375v.703H3.164z"/></g><g><path fill="#454142" d="M3.164 7.734h7.5v.704h-7.5z"/></g><g><path fill="#454142" d="M4.688 12.422H3.516V11.25h1.172zm.703-1.875H2.813v2.578H5.39z"/></g><g><path fill="#454142" d="M6.914 12.422h7.5v.703h-7.5z"/></g><g><path fill="#454142" d="M6.914 10.547h9.375v.703H6.914z"/></g><g><path fill="#454142" d="M4.688 17.11H3.516v-1.172h1.172zm.703-1.876H2.813v2.579H5.39z"/></g><g><path fill="#454142" d="M6.914 17.11h7.5v.703h-7.5z"/></g><g><path fill="#454142" d="M6.914 15.234h9.375v.704H6.914z"/></g><g><path fill="#454142" d="M4.688 21.797H3.516v-1.172h1.172zm.703-1.875H2.813V22.5H5.39z"/></g><g><path fill="#454142" d="M6.914 21.797h7.5v.703h-7.5z"/></g><g><path fill="#454142" d="M6.914 19.922h9.375v.703H6.914z"/></g><g><path fill="#454142" d="M6.914 26.484h7.5v.704h-7.5z"/></g><g><path fill="#454142" d="M6.914 24.61h9.375v.703H6.914z"/></g></g></g></svg>
              </div>
              <div class="font-light ml-30px space-y-6">
                  <div class="text-24px font-bold uppercase">{{ \wmnt\Helpers::get_string('Rekvizitai') }}</div>
                  @foreach($contacts['requisites'] as $requisite_line)
                      <div>{{ $requisite_line['line'] }}</div>
                  @endforeach
              </div>
          </div>
      </div>
      <div class="shadow-custom-1 bg-white p-30px pb-70px flex flex-col lg:flex-row items-center lg:space-x-60px">
          <div class="block lg:hidden text-20px uppercase mb-6">{{ \wmnt\Helpers::get_string('Registruokitės konsultacijai') }}</div>
          <div class="flex flex-col w-full flex-none lg:max-w-260px space-y-8 mb-8 lg:mb-0">
              <label class="flex-1 border-b border-black-1 flex flex-col">
                  <span class="uppercase text-14px font-light">{{ \wmnt\Helpers::get_string('vardas *') }}</span>
                  <input type="text" name="name" class="bg-transparent focus:outline-none">
              </label>
              <label class="flex-1 border-b border-black-1 flex flex-col">
                  <span class="uppercase text-14px font-light">{{ \wmnt\Helpers::get_string('Tel. nr. *') }}</span>
                  <input type="text" name="name" class="bg-transparent focus:outline-none">
              </label>
              <label class="flex-1 border-b border-black-1 flex flex-col">
                  <span class="uppercase text-14px font-light">{{ \wmnt\Helpers::get_string('El. pašto adresas') }}</span>
                  <input type="text" name="name" class="bg-transparent focus:outline-none">
              </label>
          </div>
          <div class="w-full lg:w-auto flex-1">
              <div class="hidden lg:block text-24px uppercase mb-4">{{ \wmnt\Helpers::get_string('Registruokitės konsultacijai') }}</div>
              <label>
                  <span class="uppercase block font-light mb-1">{{ \wmnt\Helpers::get_string('pastabos') }}</span>
                  <textarea class="bg-gray-2 w-full h-220px p-4"></textarea>
              </label>
              <div class="flex justify-between mt-6">
                  @include('components.tos-agree')
                  @include('components.submit-btn')
              </div>
          </div>
      </div>
  </div>
@endsection
