<x-app-layout>
  <x-slot name="header">
      <h2 class="uppercase font-semibold text-3xl text-center text-white leading-tight  bg-indigo-900 border-indigo-300 ">
        <a href="{{ route('studInfo.list_studInfo')}}">{{ __('STUDENT INFORMATION') }}</a>
      </h2>
  </x-slot>
          <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="min-h-full  dark:bg-gray-900 py-6 flex flex-col justify-center sm:py-12">
                      <div class="flex flex-col p-4">

                          {{-- Search --}}
                          <form action="{{ route('studInfo.searchStudInfo') }}" method="get">
                              <div class="flex-1 pr-4 pb-5">
                                  <div class="relative md:w-1/3">
                                      <input name="search" type="search"
                                          class="md:w-full w-full pl-10 pr-4 py-2 rounded-lg shadow-md border-gray-200 font-normal"
                                          placeholder="Search...">
                                      <div class="absolute top-0 left-0 inline-flex items-center p-2">
                                          <button type="submit">
                                              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400"
                                                  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                  fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                  <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                                  <circle cx="10" cy="10" r="7" />
                                                  <line x1="21" y1="21" x2="15" y2="15" />
                                              </svg>
                                          </button>
                                      </div>
                                  </div>
                              </div>
                          </form>
                          {{-- End Search --}}

                          {{-- Start Table List Student --}}
                          <div class="w-full  mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                              <div class="p-3">
                                  <div class="overflow-x-auto">
                                      <!-- Table -->
                                      <table class="table-auto w-full">
                                          <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                              <tr>
                                                  <th class="p-2 whitespace-nowrap">
                                                      <div class="font-semibold text-left">Name</div>
                                                  </th>
                                              </tr>
                                          </thead>
                                          @foreach ($detailStudentInfo as $listSudentinfo)
                          
                                          @php
                                              $id = $listSudentinfo->id
                                          @endphp
                                              <tbody class="text-sm divide-y divide-gray-100">
                                                  <tr class="hover:bg-gray-100 border-b border-gray-200 py-10" style="cursor: pointer" onclick="window.location.href='{{ ('/classInfo/detailClassStudent') }}/{{$id !=null ? $id:0}}'">
                                                      <td class="p-2 whitespace-nowrap">
                                                          <div class="flex items-center">
                                                              <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3">

                                                                  @if ($listSudentinfo->studImage != null)
                                                                      <img class="rounded-full w-11 h-11 "
                                                                          src="{{ url($listSudentinfo->studImage) }}"
                                                                          width="" height="" alt="Alex Shatov">
                                                                  @else
                                                                      <img class="rounded-full w-11 h-11 "
                                                                          src="{{ url('img/empty_image.png') }}"
                                                                          width="" height="" alt="Alex Shatov">
                                                                  @endif

                                                              </div>
                                                              <div class="font-medium text-gray-800">
                                                                  {{$listSudentinfo->studFullName}}
                                                              </div>
                                                          </div>
                                                      </td>
                                                  </tr>
                                          @endforeach
                                          </tbody>
                                      </table>
                                      {{-- End Table --}}
                                  </div>
                              </div>
                          </div>
                          <div class="d-flex justify-content-center pt-3">
                              {!! $detailStudentInfo->links() !!}
                          </div>
                          {{-- End Table List Student --}}
                      </div>
                  </div>


              </div>
          </div>

</x-app-layout>
