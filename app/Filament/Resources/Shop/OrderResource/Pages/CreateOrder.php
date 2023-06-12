<?php

namespace App\Filament\Resources\Shop\OrderResource\Pages;

use App\Filament\Resources\Shop\OrderResource;
use App\Models\Shop\Order;
use App\Models\Shop\Product;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Wizard\Step;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;
use Illuminate\Database\Eloquent\Model;

class CreateOrder extends CreateRecord
{
    use HasWizard;

    protected static string $resource = OrderResource::class;

    protected function afterCreate(): void
    {
        $order = $this->record;

        foreach ($order->items as $item) {
            $qty = Product::where('id', $item->shop_product_id)->value('qty');

            if ($item->qty > $qty) {
                Notification::make()
                    ->title('Less than available stock!')
                    ->icon('heroicon-o-shopping-bag')
                    ->body("**{$order->customer->name} ordered {$order->items->count()} products.**")
                    ->sendToDatabase(auth()->user());

                $this->halt();
            }
        }

        Notification::make()
            ->title('New order')
            ->icon('heroicon-o-shopping-bag')
            ->body("**{$order->customer->name} ordered {$order->items->count()} products.**")
            ->sendToDatabase(auth()->user());
    }

    protected function getSteps(): array
    {
        return [
            Step::make('Order Details')
                ->schema([
                    Card::make(OrderResource::getFormSchema())->columns(),
                ]),

            Step::make('Order Items')
                ->schema([
                    Card::make(OrderResource::getFormSchema('items')),
                ]),
        ];
    }
}
