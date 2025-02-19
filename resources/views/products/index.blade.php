<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('keywords.products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                    <div class="min-w-full align-middle">
                        <a href="{{ route('products.create') }}" class="mb-2 btn btn-primary">{{ __('keywords.add_new_product') }}</a>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</span>
                                    </th>
                                    <th>
                                        <span
                                            class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Price ({{ App\Helpers\setCurrency('le') }})
                                        </span>
                                    </th>
                                    <th width="20%"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($products as $product)
                                    <tr class="bg-white">
                                        <td>
                                            {{ $product->name }}
                                        </td>
                                        <td>
                                            {{ number_format($product->price, 2) }}
                                        </td>
                                        <td>
                                            {{-- @php
                                                $slug = Illuminate\Support\Str::slug($product->name, '-');
                                            @endphp --}}
                                            <div class="d-inline-flex">
                                                <a href="{{ route('products.show', $product) }}"
                                                    class="btn btn-warning me-2"> {{ __('keywords.show') }} </a>
                                                <a href="{{ route('products.edit', $product) }}"
                                                    class="btn btn-primary me-2"> {{ __('keywords.edit') }} </a>
                                                <form action="{{ route('products.destroy', $product) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                                        class="btn btn-danger"> {{ __('keywords.delete') }} </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white">
                                        <td colspan="3">
                                            {{ __('No products found') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        @if (count($products))
                            {{ $products->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
