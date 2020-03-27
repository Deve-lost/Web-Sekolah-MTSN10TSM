<?php 

use App\Guru;
use App\Siswa;
use App\Mapel;
use App\Prestasi;
use App\User;
use App\BukuInduk;

function totalGuru()
{
	return Guru::count();
}

function totalSiswa()
{
	return Siswa::count();
}

function totalUser()
{
	return User::count();
}

function totalBi()
{
	return BukuInduk::count();
}

function totalMapel()
{
	return Mapel::count();
}

function totalPrestasi()
{
	return Prestasi::count();
}

