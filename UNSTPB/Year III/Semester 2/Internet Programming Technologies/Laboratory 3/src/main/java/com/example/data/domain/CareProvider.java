package com.example.data.domain;

import jakarta.persistence.*;
import java.util.List;
import java.util.ArrayList;

@Entity
public class CareProvider {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
    private String name;
    private String specialty;

    @OneToMany(mappedBy = "careProvider")
    private List<MedicalEncounter> medicalEncounters;

    // Constructors
    public CareProvider() {}

    public CareProvider(String name, String specialty) {
        this.name = name;
        this.specialty = specialty;
    }

    // Getters and setters
    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getSpecialty() {
        return specialty;
    }

    public void setSpecialty(String specialty) {
        this.specialty = specialty;
    }

    public List<MedicalEncounter> getMedicalEncounters() {
        return medicalEncounters;
    }

    public void setMedicalEncounters(List<MedicalEncounter> medicalEncounters) {
        this.medicalEncounters = medicalEncounters;
    }

    public void addMedicalEncounter(MedicalEncounter medicalEncounter) {
        if (this.medicalEncounters == null) {
            this.medicalEncounters = new ArrayList<>();
        }
        this.medicalEncounters.add(medicalEncounter);
        medicalEncounter.setCareProvider(this);
    }
}
