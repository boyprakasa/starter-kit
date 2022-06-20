<div class="card">
    <div class="card-header bg-secondary text-white rounded">Data Pemohon</div>
    <div class="card-body">
        <table class="table table-sm table-striped">
            <tr>
                <td>Nama {{ $applicant->jns_pemohon === '02' ? 'Perusahaan' : '' }}</td>
                <td>{{ $applicant->nm_pemohon }}</td>
            </tr>
            <tr>
                <td>Alamat {{ $applicant->jns_pemohon === '02' ? 'Perusahaan' : '' }}</td>
                <td>
                    {{ $applicant->fullAddress() }}
                </td>
            </tr>

            @if ($applicant->jns_pemohon === '02')
                <tr>
                    <td>Bentuk Usaha</td>
                    <td>
                        {{ $applicant->bntk_perusahaan }}
                    </td>
                </tr>
                <tr>
                    <td>Jenis Perusahaan</td>
                    <td>
                        {{ $applicant->jns_perusahaan === 0 ? 'PMDN' : 'PMA' }}
                    </td>
                </tr>
                <tr>
                    <td>Akta Pendirian</td>
                    <td>
                        No: {{ $applicant->akta_no }}<br>
                        Tanggal: {{ date('d F Y', strtotime($applicant->tgl_akta)) }}<br>
                        Notaris: {{ $applicant->notaris }}
                    </td>
                </tr>
                @if ($applicant->aktaa_no)
                    <tr>
                        <td>Akta Perubahan</td>
                        <td>
                            No: {{ $applicant->aktaa_no }}<br>
                            Tanggal: {{ date('d F Y', strtotime($applicant->tgl_aktaa)) }}<br>
                            Notaris: {{ $applicant->notarisa }}
                        </td>
                    </tr>
                @endif
            @endif

            @if ($applicant->jns_pemohon === '02' || $applicant->jns_pemohon === '03')
                <tr>
                    <td>Direktur/Pimpinan</td>
                    <td>
                        {{ $applicant->nm_pj }}
                    </td>
                </tr>
                <tr>
                    <td>Alamat Direktur/Pimpinan</td>
                    <td>
                        {{ $applicant->alamat_pj }}
                    </td>
                </tr>
            @endif

            <tr>
                <td>NIK</td>
                <td>{{ $applicant->memberProfile->identity_number }}</td>
            </tr>
            <tr>
                <td>NPWP</td>
                <td>{{ $applicant->npwp }}</td>
            </tr>
            <tr>
                <td>NPWPD</td>
                <td>{{ $applicant->npwpd }}</td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>{{ $applicant->telepon }}</td>
            </tr>
            <tr>
                <td>Fax</td>
                <td>{{ $applicant->fax }}</td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>{{ $applicant->memberProfile->phone }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $applicant->memberProfile->user->email }}</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>{{ $applicant->jabatan }}</td>
            </tr>
            <tr>
                <td>Lampiran</td>
                <td>
                    @if ($applicant->file_ktp)
                        <a href="{{ asset('storage/' . $applicant->file_ktp) }}"
                            class="badge badge-default badge-info form-text text-white float-left ml-1"
                            target="_blank">KTP</a>
                    @endif

                    @if ($applicant->file_npwp)
                        <a href="{{ asset('storage/' . $applicant->file_npwp) }}"
                            class="badge badge-default badge-info form-text text-white float-left ml-1"
                            target="_blank">NPWP</a>
                    @endif

                    @if ($applicant->file_nib)
                        <a href="{{ asset('storage/' . $applicant->file_nib) }}"
                            class="badge badge-default badge-info form-text text-white float-left ml-1"
                            target="_blank">NIB</a>
                    @endif

                    @if ($applicant->file_akta)
                        <a href="{{ asset('storage/' . $applicant->file_akta) }}"
                            class="badge badge-default badge-info form-text text-white float-left ml-1"
                            target="_blank">Akta</a>
                    @endif
                </td>
            </tr>
        </table>
    </div>
    @if (auth()->user()->adminProfile)
        <div class="card-footer">
            <button class="btn btn-info float-right">
                <i class="fa fa-check"></i> Verifikasi
            </button>
        </div>
    @endif
</div>
