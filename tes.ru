
Cek instalasi: `ruby --version`

## Konsep Dasar

### 1. Hello World
```ruby
puts "Hello, World!"
```

### 2. Variabel
```ruby
nama = "Andi"
umur = 25
tinggi = 175.5
sudah_menikah = false

puts "Nama: #{nama}"
puts "Umur: #{umur} tahun"
```

### 3. Tipe Data
```ruby
# String (teks)
pesan = "Halo Ruby!"

# Integer (bilangan bulat)
angka = 42

# Float (bilangan desimal)
pi = 3.14

# Boolean
benar = true
salah = false

# Array (daftar)
buah = ["apel", "jeruk", "mangga"]

# Hash (pasangan kunci-nilai)
orang = { nama: "Budi", umur: 30, kota: "Jakarta" }
```

### 4. Operasi Matematika
```ruby
a = 10
b = 3

puts a + b  # Penjumlahan: 13
puts a - b  # Pengurangan: 7
puts a * b  # Perkalian: 30
puts a / b  # Pembagian: 3
puts a % b  # Modulo (sisa bagi): 1
puts a ** b # Pangkat: 1000
```

### 5. Kondisi (if-else)
```ruby
nilai = 85

if nilai >= 90
  puts "Grade A"
elsif nilai >= 80
  puts "Grade B"
elsif nilai >= 70
  puts "Grade C"
else
  puts "Grade D"
end
```

### 6. Perulangan (Loop)

**Loop dengan times:**
```ruby
5.times do
  puts "Halo!"
end
```

**Loop dengan each:**
```ruby
buah = ["apel", "jeruk", "mangga"]
buah.each do |item|
  puts "Saya suka #{item}"
end
```

**Loop dengan for:**
```ruby
for i in 1..5
  puts "Angka: #{i}"
end
```

**Loop dengan while:**
```ruby
counter = 0
while counter < 5
  puts counter
  counter += 1
end
```

### 7. Method (Fungsi)
```ruby
def sapa(nama)
  puts "Halo, #{nama}!"
end

sapa("Siti")  # Output: Halo, Siti!

# Method dengan return value
def tambah(a, b)
  return a + b
end

hasil = tambah(5, 3)
puts hasil  # Output: 8
```

### 8. Array (Daftar)
```ruby
# Membuat array
angka = [1, 2, 3, 4, 5]

# Akses elemen
puts angka[0]  # Output: 1
puts angka[-1] # Output: 5 (elemen terakhir)

# Menambah elemen
angka << 6
angka.push(7)

# Method array berguna
puts angka.length  # Panjang array
puts angka.first   # Elemen pertama
puts angka.last    # Elemen terakhir
puts angka.include?(3)  # Cek keberadaan: true
```

### 9. Hash (Dictionary)
```ruby
# Membuat hash
siswa = {
  nama: "Rina",
  umur: 17,
  kelas: "12 IPA"
}

# Akses nilai
puts siswa[:nama]  # Output: Rina

# Menambah/ubah nilai
siswa[:sekolah] = "SMAN 1"
siswa[:umur] = 18

# Iterasi hash
siswa.each do |kunci, nilai|
  puts "#{kunci}: #{nilai}"
end
```

### 10. String Methods
```ruby
teks = "Belajar Ruby"

puts teks.upcase      # BELAJAR RUBY
puts teks.downcase    # belajar ruby
puts teks.length      # 12
puts teks.reverse     # ybuR rajaleB
puts teks.include?("Ruby")  # true
puts teks.split(" ")  # ["Belajar", "Ruby"]
```

## Contoh Program Sederhana

### Program Kalkulator
```ruby
puts "=== KALKULATOR SEDERHANA ==="
print "Masukkan angka pertama: "
angka1 = gets.chomp.to_f

print "Masukkan operator (+, -, *, /): "
operator = gets.chomp

print "Masukkan angka kedua: "
angka2 = gets.chomp.to_f

case operator
when "+"
  hasil = angka1 + angka2
when "-"
  hasil = angka1 - angka2
when "*"
  hasil = angka1 * angka2
when "/"
  hasil = angka1 / angka2
else
  puts "Operator tidak valid!"
  exit
end

puts "Hasil: #{hasil}"
```

### Program Tebak Angka
```ruby
puts "=== GAME TEBAK ANGKA ==="
angka_rahasia = rand(1..10)
percobaan = 0

loop do
  print "Tebak angka (1-10): "
  tebakan = gets.chomp.to_i
  percobaan += 1
  
  if tebakan == angka_rahasia
    puts "Benar! Kamu menebak dalam #{percobaan} percobaan."
    break
  elsif tebakan < angka_rahasia
    puts "Terlalu kecil!"
  else
    puts "Terlalu besar!"
  end
end
```
