<x-app-layout>
    <h1>Административная панель</h1>

    <table class="min-w-full divide-y divide-gray-200 mt-4">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ФИО
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Текст заявления
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Номер автомобиля
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Статус
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($reports as $report)
                <tr>
                    <!-- ФИО пользователя -->
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $report->user->name ?? 'Не указан' }} 
                        {{ $report->user->lastname ?? '' }} 
                        {{ $report->user->middlename ?? '' }}
                    </td>

                    <!-- Текст заявления  -->
                    <td class="px-6 py-4 text-sm text-gray-700 max-w-md truncate">
                        {{ Str::limit($report->description, 100) }}
                    </td>

                    <!-- Номер автомобиля -->
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $report->number ?? '—' }}
                    </td>

                    <!-- Статус -->
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        @if($report->status->name === 'новое')
                            <form class="status-form inline-block" action="{{ route('reports.status.update', $report->id) }}" method="POST">
                                @method('patch')
                                @csrf
                                <select 
                                    name="status_id" 
                                    id="status_id_{{ $report->id }}"
                                    class="border border-gray-300 rounded-md px-3 py-1.5 text-sm bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 hover:border-gray-400 cursor-pointer"
                                >
                                    <option value="">Выберите...</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">
                                            {{ $status->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        @else
                            <!-- Показываем просто текст статуса -->
                            
                            <x-status :type="$report->status->id">
                                {{ $report->status->name }}
                            </x-status>
                        @endif
                    </td>
            @endforeach
        </tbody>
    </table>

    
</x-app-layout>