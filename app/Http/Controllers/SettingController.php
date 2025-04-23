// SettingController.php
class SettingController extends Controller
{
    public function edit()
    {
        $settings = Setting::all();
        return view('settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return back()->with('success', 'Configuración actualizada');
    }
}
