<div class="mb-4">
    <label class="block font-medium">Name</label>
    <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}" class="w-full border rounded p-2">
</div>

<div class="mb-4">
    <label class="block font-medium">Description</label>
    <textarea name="description" class="w-full border rounded p-2">{{ old('description', $item->description ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label class="block font-medium">Type</label>
    <input type="text" name="type" value="{{ old('type', $item->type ?? '') }}" class="w-full border rounded p-2">
</div>

<div class="mb-4">
    <label class="block font-medium">Rarity</label>
    <input type="text" name="rarity" value="{{ old('rarity', $item->rarity ?? '') }}" class="w-full border rounded p-2">
</div>

<div class="mb-4">
    <label class="block font-medium">Power</label>
    <input type="number" name="power" value="{{ old('power', $item->power ?? 0) }}" class="w-full border rounded p-2">
</div>

<div class="mb-4">
    <label class="block font-medium">Speed</label>
    <input type="number" name="speed" value="{{ old('speed', $item->speed ?? 0) }}" class="w-full border rounded p-2">
</div>

<div class="mb-4">
    <label class="block font-medium">Durability</label>
    <input type="number" name="durability" value="{{ old('durability', $item->durability ?? 0) }}" class="w-full border rounded p-2">
</div>

<div class="mb-4">
    <label class="block font-medium">Magic Property</label>
    <input type="text" name="magic_property" value="{{ old('magic_property', $item->magic_property ?? '') }}" class="w-full border rounded p-2">
</div>
