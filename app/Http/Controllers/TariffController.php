// TariffController.php
class TariffController extends Controller
{
    public function index()
    {
        $tariffs = Tariff::paginate(10);
        return view('tariffs.index', compact('tariffs'));
    }

    public function create()
    {
        return view('tariffs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:tariffs',
            'description' => 'nullable|string',
            'tariff_rate' => 'required|numeric',
            'safeguard_rate' => 'required|numeric'
        ]);

        Tariff::create($request->all());
        return redirect()->route('tariffs.index');
    }
}
