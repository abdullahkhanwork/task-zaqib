<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Models\Sales;

/**
 * @property mixed $customer
 * @method reset()
 */
class General extends Component
{
    public string $category = '';
    public string $supplier = '';
    public string $product = '';
    public string $customer = '';

    protected $listeners = ['changeFilter'];

    public function changeFilter($param, $value)
    {
        $this->reset();
        $this->$param = $value;
    }


    public function render(): Factory|View|Application
    {
        $sales = $this->renderSales();

        return view('livewire.general', compact('sales'));
    }


    public function renderSales(): Collection|array
    {
        $query = Sales::query();


        $query->when(!empty($this->category), function (Builder $q) {
            $q->whereHas('saleItems', function (Builder $q) {
                $q->whereHas('product', function (Builder $q) {
                    $q->where('category_id', '=', $this->category);
                });
            });
        });

        $query->when(!empty($this->supplier), function (Builder $q) {
            $q->whereHas('saleItems', function (Builder $q) {
                $q->whereHas('product', function (Builder $q) {
                    $q->where('supplier_id', '=', $this->supplier);
                });
            });
        });

        $query->when(!empty($this->product), function (Builder $q) {
            $q->whereHas('saleItems', function (Builder $q) {
                $q->where('product_id', '=', $this->product);
            });
        });

        $query->when(!empty($this->customer), function (Builder $q) {
            $q->where('customer_id', '=', $this->customer);
        });

        return $query->get();
    }
}
