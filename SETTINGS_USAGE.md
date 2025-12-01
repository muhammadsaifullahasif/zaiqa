# Settings Service Usage Guide

The Settings Service provides a global way to access and manage application settings stored in the database.

## Setup

1. **Run composer dump-autoload** to load the helper function:
   ```bash
   composer dump-autoload
   ```

2. The service is automatically registered and available throughout your application.

## Usage

### In Controllers

```php
use App\Services\SettingsService;

class YourController extends Controller
{
    // Method 1: Using the helper function
    public function index()
    {
        $vat = settings('vat', 0); // Get VAT with default value 0
        $currency = settings('default_currency'); // Get currency

        // Get the settings instance
        $settings = settings();
        $allSettings = $settings->all();
    }

    // Method 2: Using dependency injection
    public function show(SettingsService $settings)
    {
        $vat = $settings->get('vat', 0);
        $currency = $settings->default_currency; // Access as property
    }

    // Method 3: Using the app helper
    public function store()
    {
        $settings = app('settings');
        $vat = $settings['vat']; // Access as array
    }
}
```

### In Blade Views

The `$settings` variable is automatically shared with all views:

```blade
<!-- Access as object property -->
<p>VAT: {{ $settings->vat }}</p>
<p>Currency: {{ $settings->default_currency }}</p>

<!-- Access using get method -->
<p>VAT: {{ $settings->get('vat', 0) }}</p>

<!-- Using the helper function -->
<p>VAT: {{ settings('vat', 0) }}</p>

<!-- Check if setting exists -->
@if($settings->has('vat'))
    <p>VAT is set to: {{ $settings->vat }}</p>
@endif
```

### Setting Values

```php
// Using the helper function
settings()->set('vat', 15);
settings()->set('default_currency', 'USD');

// Using dependency injection
public function update(SettingsService $settings)
{
    $settings->set('vat', 15);
}

// Using the app helper
app('settings')->set('vat', 15);
```

### Available Methods

#### `get($key, $default = null)`
Get a setting value by key, with optional default value.

```php
$vat = settings()->get('vat', 0);
$currency = settings('default_currency', 'USD'); // Using helper shorthand
```

#### `set($key, $value)`
Set a setting value (also updates database and clears cache).

```php
settings()->set('vat', 15);
```

#### `has($key)`
Check if a setting exists.

```php
if (settings()->has('vat')) {
    // Setting exists
}
```

#### `all()`
Get all settings as an array.

```php
$allSettings = settings()->all();
```

#### `clearCache()`
Clear the settings cache (automatically called when setting values).

```php
settings()->clearCache();
```

## Access Patterns

### 1. Helper Function (Recommended)
```php
// Get instance
$settings = settings();

// Get value directly
$vat = settings('vat', 0);

// Set value
settings()->set('vat', 15);
```

### 2. Object Property Access
```php
$settings = settings();
$vat = $settings->vat;
$currency = $settings->default_currency;
```

### 3. Array Access
```php
$settings = settings();
$vat = $settings['vat'];
$currency = $settings['default_currency'];
```

### 4. Method Access
```php
$settings = settings();
$vat = $settings->get('vat', 0);
```

## Performance

- Settings are cached for 1 hour by default
- Cache is automatically cleared when settings are updated
- All settings are loaded once and stored in memory during the request

## Example: Using in Your Application

### Display VAT on Invoice
```blade
<!-- resources/views/invoice.blade.php -->
<div class="invoice">
    <p>Subtotal: ${{ $subtotal }}</p>
    <p>VAT ({{ $settings->vat }}%): ${{ $subtotal * ($settings->vat / 100) }}</p>
    <p>Total: ${{ $subtotal * (1 + $settings->vat / 100) }}</p>
</div>
```

### Display Prices with Currency Symbol
```php
// In your controller
$products = Product::all();
$currencyCode = settings('default_currency', 'USD');
$currency = config("currencies.{$currencyCode}");

return view('products.index', [
    'products' => $products,
    'currencySymbol' => $currency['symbol'] ?? '$'
]);
```

```blade
<!-- In your view -->
@foreach($products as $product)
    <div class="product">
        <h3>{{ $product->name }}</h3>
        <p>Price: {{ $currencySymbol }}{{ number_format($product->price, 2) }}</p>
    </div>
@endforeach
```

### Free Delivery Threshold
```php
// In your cart controller
public function calculateShipping($cartTotal)
{
    $threshold = settings('free_delivery_threshold', 0);

    if ($cartTotal >= $threshold) {
        return 0; // Free delivery
    }

    return $this->calculateStandardShipping();
}
```

## Notes

- Settings are automatically loaded when the application boots
- Changes to settings are immediately reflected after calling `set()`
- The cache is shared across all requests for better performance
- Settings are stored in the `settings` table with `meta_key` and `meta_value` columns
