package com.example.data.domain;

import jakarta.persistence.*;
import java.util.List;
import java.util.ArrayList;

@Entity
public class Patient {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
    private String name;

    @OneToMany(mappedBy = "patient", cascade = CascadeType.ALL, orphanRemoval = true)
    private List<HealthIssue> healthIssues;

    // Constructors
    public Patient() {}

    public Patient(String name) {
        this.name = name;
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

    public List<HealthIssue> getHealthIssues() {
        return healthIssues;
    }

    public void setHealthIssues(List<HealthIssue> healthIssues) {
        this.healthIssues = healthIssues;
    }

    public void addHealthIssue(HealthIssue healthIssue) {
        if (this.healthIssues == null) {
            this.healthIssues = new ArrayList<>();
        }
        this.healthIssues.add(healthIssue);
        healthIssue.setPatient(this);
    }

    @OneToMany(mappedBy = "patient", cascade = CascadeType.ALL, orphanRemoval = true)
    private List<MedicalEncounter> medicalEncounters;

    // Other fields and methods...

    public void addMedicalEncounter(MedicalEncounter medicalEncounter) {
        if (medicalEncounters == null) {
            medicalEncounters = new ArrayList<>();
        }
        medicalEncounters.add(medicalEncounter);
        medicalEncounter.setPatient(this);
    }
}
