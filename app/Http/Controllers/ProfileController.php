<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Lấy dữ liệu cần validate
        $data = $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $currentAvatar = $user->avatar;

        // Xóa avatar cũ nếu có
        if ($request->hasFile('avatar') && $currentAvatar && Storage::disk('public')->exists($currentAvatar)) {
            Storage::disk('public')->delete( $currentAvatar);
        
        }


        // Kiểm tra và lưu avatar mới nếu có
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        } else {
            // Nếu không có avatar mới, giữ nguyên avatar cũ
            $data['avatar'] = $currentAvatar;
        }

        // Cập nhật thông tin người dùng
        $user->update($data);

        return redirect()->back()->with('status', 'Profile updated!');
    }


}
