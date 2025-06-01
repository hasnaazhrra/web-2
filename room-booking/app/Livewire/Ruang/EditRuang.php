<?php

namespace App\Livewire\Ruang;

use App\Models\Ruang;
use Livewire\Component;
use Livewire\Attributes\Validate;

class EditRuang extends Component
{
    public Ruang $ruang;

    #[Validate('required|string|max:10')]
    public string $kode = '';

    #[Validate('required|string|max:100')]
    public string $nama = '';

    #[Validate('required|string|max:50')]
    public string $status = '';

    public function mount(Ruang $ruang)
    {
        $this->ruang = $ruang;
        $this->kode = $ruang->kode;
        $this->nama = $ruang->nama;
        $this->status = $ruang->status;
    }

    public function save()
    {
        $this->validate();

        $this->ruang->update([
            'kode' => $this->kode,
            'nama' => $this->nama,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Ruang berhasil diperbarui.');

        return $this->redirectRoute('ruang.index');
    }

    public function render()
    {
        return view('livewire.ruang.edit-ruang');
    }
}
