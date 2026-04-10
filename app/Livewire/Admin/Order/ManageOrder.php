<?php

namespace App\Livewire\Admin\Order;

use App\Models\Order;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Table;
use Livewire\Component;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup; 
class ManageOrder extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table)
    {
        return $table
            ->query(Order::query()->latest())
            ->columns([
                TextColumn::make('id')
                    ->label('Order ID')
                    ->sortable()
                    ->searchable(),
                    
                TextColumn::make('user.name')
                    ->label('Customer Name')
                    ->sortable()
                    ->searchable(),
                    
                TextColumn::make('user.email')
                    ->label('Customer Email')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('address')
                    ->label('Shipping Address')
                    ->formatStateUsing(function ($record) {
                        if (!$record->address) {
                            return 'No Address Found';
                        }
                        return $record->address->street . ', ' .
                            $record->address->city . ', ' .
                            $record->address->state . ' - ' .
                            $record->address->pincode;
                    })
                    ->limit(50)
                    ->tooltip(function ($record) {
                        if (!$record->address) {
                            return 'No Address Found';
                        }
                        return $record->address->street . ', ' .
                            $record->address->city . ', ' .
                            $record->address->state . ' - ' .
                            $record->address->pincode;
                    }),

                TextColumn::make('total_amount')
                    ->label('Total Amount')
                    ->money('INR')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Order Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processing' => 'info',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'secondary',
                    })
                    ->sortable(),

                TextColumn::make('payment_status')
                    ->label('Payment Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'paid' => 'success',
                        'pending' => 'warning',
                        'failed' => 'danger',
                        default => 'secondary',
                    }),

                TextColumn::make('created_at')
                    ->label('Order Date')
                    ->dateTime('d M Y, h:i A')
                    ->sortable(),
            ])
            ->actions([
    ActionGroup::make([

        ViewAction::make('view')
            ->label('View Details')
            ->modalHeading('Order Details')
            ->modalContent(fn($record) => view('livewire.admin.order.order-view', [
                'order' => $record
            ]))
            ->modalWidth('7xl')
            ->modalSubmitAction(false)
            ->modalCancelActionLabel('Close'),

        Action::make('update_status')
            ->label('Update Status')
            ->icon('heroicon-o-pencil')
            ->color('success')
            ->form([
                \Filament\Forms\Components\Select::make('status')
                    ->label('Order Status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default(fn($record) => $record->status)
                    ->required(),
            ])
            ->action(function ($record, array $data): void {
                $record->update(['status' => $data['status']]);

                \Filament\Notifications\Notification::make()
                    ->title('Order status updated successfully')
                    ->success()
                    ->send();
            }),

    ])
])
            ->bulkActions([
                // Add bulk actions if needed
            ])
            ->defaultSort('created_at', 'desc');
    }

    public function render()
    {
        return view('livewire.admin.order.manage-order')->layout('layouts.admin');
    }
}