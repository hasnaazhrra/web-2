<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Create Pegawai</h1>
    <form wire:submit.prevent="save" class="space-y-4">
        <flux:input type="text" id="nip" wire:model.defer="nip" label="Kode Pegawai"
            placeholder="Masukkan NIP Pegawai" required />
        <flux:input type="text" id="nip" wire:model.defer="nama" label="Nama Pegawai"
            placeholder="Masukkan Nama Pegawai" required />
        <flux:select id="status" wire:model.defer="status" label="Unit Kerja" placeholder="Pilih Unit Kerja"
        required>
            <flux:select.option value="Tersedia">Tersedia</flux:select.option>
            <flux:select.option value="Tidak Tersedia">Tidak Tersedia</flux:select.option>
            <flux:select.option value="Dibooking">Dibooking</flux:select.option>
            <flux:select.option value="Maintenance">Maintenance</flux:select.option>
        </flux:select>
        <flux:button type="submit" variant="primary"> Save </flux:button>
    </form>
</div>