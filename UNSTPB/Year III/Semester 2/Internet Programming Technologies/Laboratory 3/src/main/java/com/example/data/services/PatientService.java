package com.example.data.services;

import com.example.data.domain.Patient;

import java.util.List;

public interface PatientService{

    List<Patient> findAll();

    Patient save(Patient p);

    List<Patient> findPatient(long id, String name);
}
