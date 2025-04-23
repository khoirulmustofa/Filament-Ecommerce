<?php
namespace App\Providers\Filament\Auth;

use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Component;
use Filament\Pages\Auth\Login as BaseLogin;
 
class Login extends BaseLogin
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getEmailFormComponent()->default('admin@gmail.com'),
                $this->getPasswordFormComponent()->default('password'),
                $this->getRememberFormComponent()->default(true),
            ])
            ->statePath('data');
    }

}