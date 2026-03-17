<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ride;

class RideController extends Controller
{
    public function index(Request $request)
    {
        $query = Ride::query();

        // 📅 Date filter
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // 🔍 Search (name / phone / driver)
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('rider_name', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%")
                  ->orWhere('driver_name', 'like', "%$search%");
            });
        }

        // 🔥 pagination (FAST)
      $rides = $query->latest()->get();
        return view('admin.ride.index', compact('rides'));
    }

    // 👁 View page
    public function show($id)
    {
        $ride = Ride::findOrFail($id);
        return view('admin.ride.show', compact('ride'));
    }

    // 🗑 Delete
    public function destroy($id)
    {
        Ride::findOrFail($id)->delete();
        return back()->with('success', 'Ride deleted successfully');
    }
}
